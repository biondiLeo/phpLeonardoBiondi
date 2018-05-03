$(document).ready(function(){
    $("#bottoneConferma").click(function(){
      $.getJSON("http://api.openweathermap.org/data/2.5/weather",{'q':$('#citta').val(),'APPID':"b74f5fd3a227fb7594b28281169b412e"}, function(result){
        if(result)
        {
          var num = 0;
          var tabella;
          var infoLuogo;
          $("#contenitoreTabella").empty();
          $("#infoLuogo").empty();
          tabella = $('<table id="tabella'+ num +'" class="table table-striped"><tbody></tbody></table>');
         // intestazioneTabella = $('<thead><tr><th>'+ result.name + result.coord.lon + result.coord.lat +'</th></tr></thead>');
         // tabella.append(intestazioneTabella);
          infoLuogo = $('<p><img src=http://openweathermap.org/img/w/'+  result.weather[0].icon +'.png height="75" width="75"><label>'+ result.name +', '+ result.sys.country +' (lon = '+ result.coord.lon +', lat = '+ result.coord.lat +')</label></p>');
          $("#infoLuogo").append(infoLuogo);

          var main = $('<tr><td>main</td><td>'+ result.weather[0].main +'</td></tr>');
          var description = $('<tr><td>description </td><td>'+ result.weather[0].description +'</td></tr>');
          var temp = $('<tr><td>temp</td><td>'+ result.main.temp +'</td></tr>');
          var pressure = $('<tr><td>pressure</td><td>'+ result.main.pressure +'</td></tr>');
          var humidity = $('<tr><td>humidity</td><td>'+ result.main.humidity +'</td></tr>');
          var windSpeed = $('<tr><td>wind speed</td><td>'+ result.wind.speed +'</td></tr>');
          var windDeg = $('<tr><td>wind deg</td><td>'+ result.wind.deg +'</td></tr>');
          var visibility = $('<tr><td>visibility</td><td>'+ result.visibility +'</td></tr>');

         // var righeTabella = main + description + temp + pressure + humidity + windSpeed + windDeg + visibility;
          tabella.append(main);
          tabella.append(description);
          tabella.append(temp);
          tabella.append(pressure);
          tabella.append(humidity);
          tabella.append(windSpeed);
          tabella.append(windDeg);
          tabella.append(visibility);
           $("#contenitoreTabella").append(tabella);
           num++;
        }
      });
    });
  
    $("#cercaForecast").click(function(){
      $.getJSON("http://api.openweathermap.org/data/2.5/forecast",{'q':$('#cittaForecast').val(),'APPID':"b74f5fd3a227fb7594b28281169b412e"}, function(result){
      if(result)
      {
        var num = 0;
        var tabella;
        var infoLuogo;

        tabella = $('<table id="forecast'+ num +'" class="table table-striped"><tbody></tbody></table>');
       // intestazioneTabella = $('<thead><tr><th>'+ result.name + result.coord.lon + result.coord.lat +'</th></tr></thead>');
       // tabella.append(intestazioneTabella);


        var main = $('<tr><td>main</td><td>'+ result.weather[0].main +'</td></tr>');
        var description = $('<tr><td>description </td><td>'+ result.weather[0].description +'</td></tr>');
        var temp = $('<tr><td>temp</td><td>'+ result.main.temp +'</td></tr>');
        var pressure = $('<tr><td>pressure</td><td>'+ result.main.pressure +'</td></tr>');
        var humidity = $('<tr><td>humidity</td><td>'+ result.main.humidity +'</td></tr>');
        var windSpeed = $('<tr><td>wind speed</td><td>'+ result.wind.speed +'</td></tr>');
        var windDeg = $('<tr><td>wind deg</td><td>'+ result.wind.deg +'</td></tr>');
        var visibility = $('<tr><td>visibility</td><td>'+ result.visibility +'</td></tr>');

       // var righeTabella = main + description + temp + pressure + humidity + windSpeed + windDeg + visibility;
        tabella.append(main);
        tabella.append(description);
        tabella.append(temp);
        tabella.append(pressure);
        tabella.append(humidity);
        tabella.append(windSpeed);
        tabella.append(windDeg);
        tabella.append(visibility);
         $("#tabellaForecast").append(tabella);
         num++;



      }
    });
  });
  $("#btnAnnulla1").click(function(){
    $("#citta").val("");
  });
  $("#btnAnnulla2").click(function(){
    $("#cittaForecast").val("");
    $("#dateTime").val("");
  });
});