const a=Number(prompt("First number")), b=Number(prompt("Second number"));
if(Number.isFinite(a)&&Number.isFinite(b)){const r={sum:a+b,diff:a-b,product:a*b,division:b!==0?a/b:"Cannot divide by zero"};console.log(r);alert(JSON.stringify(r));}
