#include <FirebaseESP8266.h>
#include <ESP8266WiFi.h>
#include <ArduinoJson.h> // Library for processing JSON
  
// Set up WiFi credentials
const char* ssid = "ASUS";
const char* password = "12345678";

// Firebase credentials
const char* firebaseHost = "https://pumpair-d044f-default-rtdb.firebaseio.com";
const char* firebaseAuth = "vvfZvzxy0h4r3QV7si7grl8sliZfolAmGwRi4KeJ";

FirebaseData firebaseData;
FirebaseAuth firebaseAuthObject;
FirebaseConfig firebaseConfig;

unsigned long lastTimestamp = 0;

void setup() {
    Serial.begin(115200);
    delay(100);

    // Connect to WiFi
    WiFi.begin(ssid, password);
    while (WiFi.status() != WL_CONNECTED) {
        delay(500);
        Serial.print(".");
    }
    Serial.println("Connected to WiFi");
    
    // Initialize Firebase
    firebaseConfig.host = firebaseHost;
    firebaseConfig.signer.tokens.legacy_token = firebaseAuth;
    Firebase.begin(&firebaseConfig, &firebaseAuthObject);
}

void loop() {
    // Get data from Firebase
    if (Firebase.getJSON(firebaseData, "/history")) {
        if (firebaseData.dataType() == "json") {
            FirebaseJson& json = firebaseData.jsonObject();
            String jsonStr;
            json.toString(jsonStr, true);

            // Parse the JSON data
            DynamicJsonDocument doc(1024);
            deserializeJson(doc, jsonStr);

            const char* latestKey = nullptr;
            const char* latestDate = nullptr;
            const char* latestidTaneman = nullptr;
            const char* latestipinModeStr = nullptr;
            unsigned long latestTimestamp = 0;

            for (JsonPair kv : doc.as<JsonObject>()) {
                const char* key = kv.key().c_str();
                JsonObject userData = kv.value().as<JsonObject>();

                const char* date = userData["date"];
                const char* idTaneman = userData["id_taneman"];
                const char* pinMode = userData["pinMode"];
                
                // Convert date string to timestamp for comparison
                struct tm tm;
                if (strptime(date, "%Y-%m-%d %H:%M:%S", &tm)) {
                    unsigned long timestamp = mktime(&tm);
                    if (timestamp > latestTimestamp) {
                        latestTimestamp = timestamp;
                        latestKey = key;
                        latestDate = date;
                        latestidTaneman = idTaneman;
                        latestipinModeStr = pinMode;
                    }
                }
            }

            if (latestTimestamp > lastTimestamp) {
                lastTimestamp = latestTimestamp;
                
                Serial.print("ID: ");
                Serial.println(latestKey);
                Serial.print("Date: ");
                Serial.println(latestDate);
                Serial.print("latestidTaneman: ");
                Serial.println(latestidTaneman);
                Serial.print("latestipinMode: ");
                Serial.println(latestipinModeStr);
                Serial.println("menyala");
                
                int latestipinMode = atoi(latestipinModeStr); // Convert pinMode to integer
                pinMode(latestipinMode, OUTPUT); // Set pin mode dynamically
                digitalWrite(latestipinMode, LOW);
                Serial.println(latestipinMode);
                delay(60000); // Short delay before checking again
            } else {
                Serial.println("No new data");
                Serial.println("mati");
                
                int latestipinMode = atoi(latestipinModeStr); // Convert pinMode to integer
                pinMode(latestipinMode, OUTPUT); // Set pin mode dynamically
                digitalWrite(latestipinMode, HIGH);   // turn the LED off
                delay(5000); // Delay before checking for new data again
            }
        } else {
            Serial.println("Retrieved data is not JSON");
            delay(5000); // Delay before checking for new data again
        }
    } else {
        Serial.println("Failed to get data from Firebase");
        Serial.println(firebaseData.errorReason());
        delay(5000); // Delay before checking for new data again
    }
}
