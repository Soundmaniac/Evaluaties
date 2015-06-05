console.log("test1");
var val1 = 1;
var val2 = 2;
var val3 = 3;
var val4 = 450;
var val5 = 700;

var chartData = {
	labels: ["Value1", "Value2", "Value3"],
	datasets: [
	{
		fillColor: "#48A97", /*Kleur van de staaf*/
		strokeColor: "#48A4D1", /*Kleur van de lijn om de staaf*/
		data: [val1, val2, val3]
	},
	{
		fillColor: "rgba(73,188,170,0.4)",
		strokeColor: "rgba(72,174,209,0.4)",
		data: [4, 3, 2]
	},
	{
		fillColor: "#48A97",
		strokeColor: "#48A4D1",
		data: [5, 6, 7]
	}
	]
}

var ctx = document.getElementById("resultChart").getContext("2d");
new Chart(ctx).Bar(chartData);