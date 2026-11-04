const n=Number(prompt("Terms"));let a=0,b=1,s=[];for(let i=0;i<n;i++){s.push(a);[a,b]=[b,a+b]}document.body.textContent=s.join(", ");
