
//AT+CWJAP="Pooja","Pooja123"
#include <SoftwareSerial.h>
#include <dht11.h>
#define DHT11PIN 0
dht11 DHT11;

#define RX 10 // Arduino 11
#define TX 11 // Arduino 10
String AP = "Anuradha";       // CHANGE ME
String PASS = "Annu12345"; // CHANGE ME
String API = "B3FL0KXTD9WPSNB0";   // CHANGE ME
String HOST = "api.thingspeak.com";
String PORT = "80";
String field1 = "field1";
String field2 = "field2";
String field3 = "field3";

int countTrueCommand;
int countTimeCommand; 
boolean found = false; 
int valSensor1 = 1;
int valSensor2 = 1;
int valSensor3 = 1;
int s4,s5,s6;
SoftwareSerial esp8266(RX,TX); 
 
  
void setup() {
  Serial.begin(9600);
  esp8266.begin(115200);
  sendCommand("AT",5,"OK");
  sendCommand("AT+CWMODE=1",5,"OK");
  sendCommand("AT+CWJAP=\""+ AP +"\",\""+ PASS +"\"",20,"OK");
}
void loop() {
 valSensor1 = getSensorData1();
 valSensor2 = getSensorData2();
 valSensor3 = getSensorData3();
   //int chk = DHT11.read(A0);
 String getData = "GET /update?api_key="+ API +"&"+ field1 + "="+ String(valSensor1) + "&" + field2 + "=" + String(valSensor2) +  "&" + field3 + "=" + String(valSensor3) ;
// /Serial.println("Value is:" + valSensor);
sendCommand("AT+CIPMUX=1",5,"OK");
 sendCommand("AT+CIPSTART=0,\"TCP\",\""+ HOST +"\","+ PORT,15,"OK");
 sendCommand("AT+CIPSEND=0," +String(getData.length()+4),4,">");
 esp8266.println(getData);delay(1000);countTrueCommand++;
 sendCommand("AT+CIPCLOSE=0",5,"OK");
}
int getSensorData1(){
  int chk = DHT11.read(A0);
  s4=((float)DHT11.humidity);
  Serial.println("Humidity");
  Serial.println(s4);
  return(s4);
}
int getSensorData2(){
  int chk1 = DHT11.read(A0);
 s5=((float)DHT11.temperature);
 Serial.println("Temp");
  Serial.println(s5);
  return(s5);
}
int getSensorData3(){
 int s6= analogRead(A1);
 Serial.println("Gas");
  Serial.println(s6);
  return(s6);
}
void sendCommand(String command, int maxTime, char readReplay[]) {
  Serial.print(countTrueCommand);
  Serial.print(". at command => ");
  Serial.print(command);
  Serial.print(" ");
  while(countTimeCommand < (maxTime*1))
  {
    esp8266.println(command);//at+cipsend
    if(esp8266.find(readReplay))//ok
    {
      found = true;
      break;
    }
  
    countTimeCommand++;
  }
  
  if(found == true)
  {
    Serial.println("YES");
    countTrueCommand++;
    countTimeCommand = 0;
  }
  
  if(found == false)
  {
    Serial.println("Fail");
    countTrueCommand = 0;
    countTimeCommand = 0;
  }
  
  found = false;
  
 }
