$(function(){"use strict";var s=$.map(countries,function(e,a){return{value:e,data:a}});$.mockjax({url:"*",responseTime:2e3,response:function(e){var a=e.data.query,o=a.toLowerCase(),t=new RegExp("\\b"+$.Autocomplete.utils.escapeRegExChars(o),"gi"),n={query:a,suggestions:$.grep(s,function(e){return t.test(e.value)})};this.responseText=JSON.stringify(n)}}),$("#autocomplete-ajax").autocomplete({lookup:s,lookupFilter:function(e,a,o){return new RegExp("\\b"+$.Autocomplete.utils.escapeRegExChars(o),"gi").test(e.value)},onSelect:function(e){$("#selction-ajax").html("You selected: "+e.value+", "+e.data)},onHint:function(e){$("#autocomplete-ajax-x").val(e)},onInvalidateSelection:function(){$("#selction-ajax").html("You selected: none")}});var e=$.map(["Anaheim Ducks","Atlanta Thrashers","Boston Bruins","Buffalo Sabres","Calgary Flames","Carolina Hurricanes","Chicago Blackhawks","Colorado Avalanche","Columbus Blue Jackets","Dallas Stars","Detroit Red Wings","Edmonton OIlers","Florida Panthers","Los Angeles Kings","Minnesota Wild","Montreal Canadiens","Nashville Predators","New Jersey Devils","New Rork Islanders","New York Rangers","Ottawa Senators","Philadelphia Flyers","Phoenix Coyotes","Pittsburgh Penguins","Saint Louis Blues","San Jose Sharks","Tampa Bay Lightning","Toronto Maple Leafs","Vancouver Canucks","Washington Capitals"],function(e){return{value:e,data:{category:"NHL"}}}),a=$.map(["Atlanta Hawks","Boston Celtics","Charlotte Bobcats","Chicago Bulls","Cleveland Cavaliers","Dallas Mavericks","Denver Nuggets","Detroit Pistons","Golden State Warriors","Houston Rockets","Indiana Pacers","LA Clippers","LA Lakers","Memphis Grizzlies","Miami Heat","Milwaukee Bucks","Minnesota Timberwolves","New Jersey Nets","New Orleans Hornets","New York Knicks","Oklahoma City Thunder","Orlando Magic","Philadelphia Sixers","Phoenix Suns","Portland Trail Blazers","Sacramento Kings","San Antonio Spurs","Toronto Raptors","Utah Jazz","Washington Wizards"],function(e){return{value:e,data:{category:"NBA"}}}),o=e.concat(a);$("#autocomplete").devbridgeAutocomplete({lookup:o,minChars:1,onSelect:function(e){$("#selection").html("You selected: "+e.value+", "+e.data.category)},showNoSuggestionNotice:!0,noSuggestionNotice:"Sorry, no matching results",groupBy:"category"}),$("#autocomplete-custom-append").autocomplete({lookup:s,appendTo:"#suggestions-container"}),$("#autocomplete-dynamic").autocomplete({lookup:s})});