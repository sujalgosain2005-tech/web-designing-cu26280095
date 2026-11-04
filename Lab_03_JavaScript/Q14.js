const json='{"name":"Aman"}';try{const obj=JSON.parse(json);console.log(obj.name)}catch(e){console.error("Invalid JSON")}finally{console.log("Parsing finished")}
