function check(n){if(n<2)return "Neither prime nor composite";for(let i=2;i<=Math.sqrt(n);i++)if(n%i===0)return "Composite";return "Prime"}
const n=Number(prompt("Enter number"));document.body.innerHTML="<div>"+check(n)+"</div>";
