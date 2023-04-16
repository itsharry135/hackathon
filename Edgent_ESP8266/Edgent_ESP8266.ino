#define BLYNK_TEMPLATE_ID "TMPL36OdJvfPB"
#define BLYNK_TEMPLATE_NAME "Project 1"

#define BLYNK_FIRMWARE_VERSION        "0.1.0"

#define BLYNK_PRINT Serial

#define APP_DEBUG

#define trig D5
#define echo D6

#include "BlynkEdgent.h"
#include <ESP8266WiFi.h>

char auth[] = "fPn_a3rPl96TXB7Tc0dKbL3w0KLKHmoC"; // Replace with your Blynk auth token
char ssid[] = "Jarvis"; // Replace with your Wi-Fi network name
char pass[] = "12345678"; // Replace with your Wi-Fi network password

BlynkTimer timer;
long BinDepth=16.5;

void GarbageLevel(){
  digitalWrite(trig,LOW);
  delayMicroseconds(2);
  digitalWrite(trig, HIGH);
  delayMicroseconds(10);
  digitalWrite(trig, LOW);
  long t = pulseIn(echo, HIGH);
  long cm = (t / 2)/29.1;
  Serial.println(cm);
  double level= BinDepth-cm;
  if(level>0){
    long percentage=((level/BinDepth))*100;
    Blynk.virtualWrite(V3,percentage);
  }

  else{
    Blynk.virtualWrite(V3,0);
  }

}

void setup()
{
  pinMode(trig, OUTPUT);
  pinMode(echo, INPUT);
  Serial.begin(115200);
  delay(100);
  
  WiFi.begin(ssid, pass); // Connect to Wi-Fi network
  
  while (WiFi.status() != WL_CONNECTED) { // Wait for Wi-Fi to connect
    delay(500);
    Serial.print(".");
  }
  
  Blynk.config(auth); // Configure Blynk
  Blynk.connect(); // Connect to Blynk server
  timer.setInterval(10L, GarbageLevel);
}

void loop() {
  Blynk.run(); // Run Blynk
  timer.run();
}
