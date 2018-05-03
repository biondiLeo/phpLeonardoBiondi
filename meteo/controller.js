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
          tabella.append(main).append(description).append(temp).append(pressure).append(humidity).append(windSpeed).append(windDeg).append(visibility);
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
        var valOption = 0;
        var idOption = 0;

        $("#selDateTime").empty();
        $.each(result.list,function(k,v){
          var option = $('<option value='+ valOption +' id='+ k +'> '+ v['dt_txt'] +' </option>');
          $("#selDateTime").append(option);
          valOption++;
        });
       // intestazioneTabella = $('<thead><tr><th>'+ result.name + result.coord.lon + result.coord.lat +'</th></tr></thead>');
       // tabella.append(intestazioneTabella);
  
   

      }
    });
  });
  
  
  $("#btnAnnulla1").click(function(){
    $("#citta").val("");
    $("#contenitoreTabella").empty();
    $("#infoLuogo").empty();
  });
  $("#btnAnnulla2").click(function(){
    $("#cittaForecast").val("");
    $("#contenitoreTabellaForecast").empty();
    $("#selDateTime").val("");
    $("#infoLuogoForecast").empty();
  });
});

  function changeSelect(sel)
  {
    $.getJSON("http://api.openweathermap.org/data/2.5/forecast",{'q':$('#cittaForecast').val(),'APPID':"b74f5fd3a227fb7594b28281169b412e"}, function(result){
      if(result)
      {
        var num = 0;
        var tabella;
        var infoLuogo;
        var valOption = 0;
        var idOption = 0;
        $("#contenitoreTabellaForecast").empty();
        $("#infoLuogoForecast").empty();
        tabella = $('<table id="tabella'+ num +'" class="table table-striped"><tbody></tbody></table>');
        
        infoLuogo = $('<p style="margin-top:20px;"><img src=http://openweathermap.org/img/w/'+  result.list[sel.value].weather[0].icon +'.png height="75" width="75"><label></label></p>');
        $("#infoLuogoForecast").append(infoLuogo);
        
        var main = $('<tr><td>main</td><td>'+ result.list[sel.value].weather[0].main +'</td></tr>');
        var description = $('<tr><td>description </td><td>'+ result.list[sel.value].weather[0].description +'</td></tr>');
        var temp = $('<tr><td>temp</td><td>'+ result.list[sel.value].main.temp +'</td></tr>');
        var pressure = $('<tr><td>pressure</td><td>'+ result.list[sel.value].main.pressure +'</td></tr>');
        var humidity = $('<tr><td>humidity</td><td>'+ result.list[sel.value].main.humidity +'</td></tr>');
        var windSpeed = $('<tr><td>wind speed</td><td>'+ result.list[sel.value].wind.speed +'</td></tr>');
        var windDeg = $('<tr><td>wind deg</td><td>'+ result.list[sel.value].wind.deg +'</td></tr>');
     
       tabella.append(main).append(description).append(temp).append(pressure).append(humidity).append(windSpeed).append(windDeg);
       $("#contenitoreTabellaForecast").append(tabella);
        
        num++;
      }
    });
  }



