$(document).ready(function(){
  $("#bottoneConferma").click(function(){
    $.getJSON("http://api.openweathermap.org/data/2.5/weather",{'q':$('#citta').val(),'APPID':"b74f5fd3a227fb7594b28281169b412e"}, function(result){
     
      if(result)
      {
       
        var tabella;
        var intestazioneTabella;
        
       // tabella = $('<table id="tabella'+ num +'" class="table"><tbody></tbody></table>');
        intestazioneTabella = $('<thead><tr><th>'+ result.name + result.coord.lon + result.coord.lat +'</th></tr></thead>');
        $("#tabella").append(intestazioneTabella);

       
        var main = $('<tr><td> main '+ result.weather[0].main +'</td></tr>');
        var description = $('<tr><td> description  '+ result.weather[0].description +'</td></tr>');
        var temp = $('<tr><td> temp  '+ result.main.temp +'</td></tr>');
        var pressure = $('<tr><td> pressure  '+ result.main.pressure +'</td></tr>');
        var humidity = $('<tr><td> humidity '+ result.main.humidity +'</td></tr>');
        var windSpeed = $('<tr><td> wind speed  '+ result.wind.speed +'</td></tr>');
        var windDeg = $('<tr><td> wind deg  '+ result.wind.deg +'</td></tr>');
        var visibility = $('<tr><td> visibility  '+ result.visibility +'</td></tr>');

        var righeTabella = main + description + temp + pressure + humidity + windSpeed + windDeg + visibility;
        $("#tabella").append(righeTabella);
        
      
          
      }
    });
  });
});