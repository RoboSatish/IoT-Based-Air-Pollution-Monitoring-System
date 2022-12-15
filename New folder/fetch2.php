
<?php // set your channel IDs here
var channel_id1 = 12345;
var channel_id2 = 12346;
var channel_id3 = 12347;
// set your channel read api keys here
var api_key1 = '9XXQ4X79WQJC72SZ';
var api_key2 = '2KJQ2Q82YTPA23CQ';
var api_key3 = '5SWQ9F87UULD86NB';

function getData() {
//Get Data Set 1
$.getJSON('https://api.thingspeak.com/channels/' + channel_id1 + '/feed/last.json?api_key=' + api_key1, function(data1) {
    //Get Data Set 2
    $.getJSON('https://api.thingspeak.com/channels/' + channel_id2 + '/feed/last.json?api_key=' + api_key2, function(data2) {
         //Get Data Set 3
         $.getJSON('https://api.thingspeak.com/channels/' + channel_id3 + '/feed/last.json?api_key=' + api_key3, function(data3) {
             //Do something with the data here

             //Save the maximum of data1.field2 and data3.field4 in data3.field4
             if(data1.field2 &gt; data3.field4) {
                 maxvalURL = "https://api.thingspeak.com/update?key=" + api_key3 + "&amp;field4=" + data1.field2;
                 $.post(maxvalURL);
             }
         });
    });
});
?>