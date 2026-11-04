function done(value,callback){setTimeout(()=>callback("Completed: "+value),500)}done("Task",message=>console.log(message));
