/*
 Basic ESP8266 MQTT example
 This sketch demonstrates the capabilities of the pubsub library in combination
 with the ESP8266 board/library.
 It connects to an MQTT server then:
  - publishes "hello world" to the topic "outTopic" every two seconds
  - subscribes to the topic "inTopic", printing out any messages
    it receives. NB - it assumes the received payloads are strings not binary
  - If the first character of the topic "inTopic" is an 1, switch ON the ESP Led,
    else switch it off
 It will reconnect to the server if the connection is lost using a blocking
 reconnect function. See the 'mqtt_reconnect_nonblocking' example for how to
 achieve the same result without blocking the main loop.
 To install the ESP8266 board, (using Arduino 1.6.4+):
  - Add the following 3rd party board manager under "File -> Preferences -> Additional Boards Manager URLs":
       http://arduino.esp8266.com/stable/package_esp8266com_index.json
  - Open the "Tools -> Board -> Board Manager" and click install for the ESP8266"
  - Select your ESP8266 in "Tools -> Board"
*/

#include <ESP8266WiFi.h>
#include <PubSubClient.h>
#include <DHT.h>  
// Update these with values suitable for your network.

const char* ssid = "Familia Ordone";
const char* password = "familiao12349";
const char* mqtt_server = "142.44.247.98";
char mensaje[500]="";
int ultimaVez = millis(); // Para enviar cada X segundos pero sin usar delay
#define TIEMPO_ESPERA 4000 // Cada cuánto leer del sensor

#define DHTPIN 13

#define DHTTYPE DHT11   

DHT dht(DHTPIN, DHTTYPE);

WiFiClient espClient;
PubSubClient client(espClient);
unsigned long lastMsg = 0;
#define MSG_BUFFER_SIZE  (50)
char msg[MSG_BUFFER_SIZE];
int value = 0;

#define D1 5

#define D2 4

void setup_wifi() {

  delay(10);
  // We start by connecting to a WiFi network
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);

  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  randomSeed(micros());

  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
}

void callback(char* topic, byte* payload, unsigned int length) {
 
  
  Serial.print("Message arrived [");
  Serial.print(topic);
  Serial.print("] ");
  for (int i = 0; i < length; i++) {
    Serial.print((char)payload[i]);
  }
  Serial.println();

  // Switch on the LED if an 1 was received as first character
  Serial.print((char)payload[0]);
  if ((char)payload[0] == '1') {
    digitalWrite(D1,HIGH);   // Turn the LED on (Note that LOW is the voltage level
    // but actually the LED is on; this is because
    // it is active low on the ESP-01)
  } if ((char)payload[0] == '0') {
    digitalWrite(D1, LOW);  // Turn the LED off by making the voltage HIGH
  }
  


}

void reconnect() {
  // Loop until we're reconnected
  while (!client.connected()) {
    Serial.print("Attempting MQTT connection...");
    // Create a random client ID
    String clientId = "ESP8266Client-";
    clientId += String(random(0xffff), HEX);
    // Attempt to connect
    if (client.connect(clientId.c_str())) {
      Serial.println("connected");
      // Once connected, publish an announcement...
      client.publish("testtopic","conectado");
      // ... and resubscribe
      client.subscribe("testtopic");
    } else {
      Serial.print("failed, rc=");
      Serial.print(client.state());
      Serial.println(" try again in 5 seconds");
      // Wait 5 seconds before retrying
      delay(5000);
    }
  }
}

void setup() {
    dht.begin();
  pinMode(D1, OUTPUT);
  pinMode(D2, OUTPUT);// Initialize the BUILTIN_LED pin as an output
  Serial.begin(115200);
  setup_wifi();
  client.setServer(mqtt_server, 1883);
  client.setCallback(callback);
}

void loop() {

  if (!client.connected()) {
    reconnect();
  }
  client.loop();
  
  unsigned long now = millis();
  if (now - lastMsg > 2000) {
    lastMsg = now;
    ++value;
    snprintf (msg, MSG_BUFFER_SIZE, "hello world #%ld", value);
    Serial.print("Publish message: ");
    Serial.println(msg);
    client.publish("outTopic", msg);
  }
  
 

    // Si han pasado más de 2 segundos desde la última vez, enviar un mensaje
  if (millis() - ultimaVez > TIEMPO_ESPERA)
  {
    float temp = dht.readTemperature(); 

  float hum = dht.readHumidity();
    // En ocasiones puede devolver datos erróneos; por eso lo comprobamos
    if (isnan(temp) || isnan(hum))
    {
      ultimaVez = millis();
      return;
    }

    String clientId = "ESP8266Client-";
    clientId += String(random(0xffff), HEX);
  
  
  
    if (client.connect(clientId.c_str())) {
      
        Serial.println("connected");
      
        // Once connected, publish an announcement...

       delay(1000);
       
       sprintf(mensaje, "Temperatura: %.2f. Humedad: %.2f", temp, hum);
       
       client.publish("temp", mensaje);
    } 
  }
  delay(10);
  
}
