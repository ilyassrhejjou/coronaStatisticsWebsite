/* We have created this website for a school project, in the Higher School of Technology Salé
    Mohammed 5 university, the goal from this website is to fight the coronavirus with a different
     way; with the way that we know WITH THE DEV WAY :))).
     we use some free APIs to get the latest statistics numbers about Covid19 and a global overview about Morocco
     */

// the link of the free API to get the latest numbers
const url_api = 'https://api.thevirustracker.com/free-api?countryTotal=MA'
// this function created to get the statistics and show it from the API
async function getStatistics() {
    const reponse = await fetch(url_api) //we should wait til the data loaded
    const data = await reponse.json()
    //set the values of statistics to the html elements
    document.getElementById('number_confirmed').textContent = await data.countrydata[0].total_cases;
    document.getElementById('number_recovred').textContent = await data.countrydata[0].total_recovered;
    document.getElementById('number_deaths').textContent = await data.countrydata[0].total_deaths;
    document.getElementById('new_cases').textContent = await data.countrydata[0].total_new_cases_today;
    document.getElementById('new_deaths').textContent = await data.countrydata[0].total_new_deaths_today;
   document.getElementById('number_active').textContent = await data.countrydata[0].total_active_cases;
    document.getElementById('number_serious').textContent = await data.countrydata[0].total_serious_cases;
   $(".number").counterUp({ delay: 10, time: 1000 })
}
//run the function
getStatistics()
setInterval(getStatistics,20000);//refresh the data


let to = formatDate(new Date(Date.now()))// define the "to" date to get the last 12 statistics
let from = getFrom()// define the "from" date te get the last 12 statistics

var xDate = [];// define the X line of the chart ( date)
var xData = [];// define the Y line of the chart (data)



// I use this function to get the data of last 12 days and put it into the daillyArray
//the url_api2 variable is the link of the second free API to get the timeline of statistis
const url_api2 = 'https://api.covid19api.com/country/morocco/status/confirmed?from=' + from + '&to=' + to
async function getTotalData() {
    const response2 = await fetch(url_api2)// wait till the data is loaded
    const data2 = await response2.json()
    for (i = 0; i < 12; i++) {
        let daillyData = await data2[i].Cases;// get the data of certain day and push it into an array
        xData.push(daillyData);
    }
}



//i use this function to get the from date
function getFrom() {
    let dt = new Date(Date.now() - 12 * 24 * 60 * 60 * 1000)// the date of the -12 day
    let date = formatDate(dt) // format the date to be like YYYY-MM-DD
    return date;
}

// i use this function to change the format of the date to be like YYYY-MM-DD
function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();
    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;
    return [year, month, day].join('-');
}

// i use this function to get the X line of the chart

async function getXLine() {
    for (j = 12; j > 0; j--) {
        let dateD = new Date(Date.now() - j * 24 * 60 * 60 * 1000)
        var month = '' + (dateD.getMonth() + 1),
            day = '' + dateD.getDate()
        if (month.length < 2)
            month = '0' + month;
        if (day.length < 2)
            day = '0' + day;
        let finalDate = [day, month].join('-')
        xDate.push(finalDate) // push the day and the month into an array of X chart
    }
}

// I use this function to create a chart using the chart.js library with the data that we got from the API
chartIt()
// before refreshing the data we should reset the variable memories to record the new values
function resetData() {
    xData = [];
    xDate = [];
}
setInterval(chartIt,20000);//refresh the data of the chart

//i used these lines bellow to create the timeline chart of covid19 in Morocco
async function chartIt() {
    await getTotalData()// we should wait till the data is loaded
    await getXLine()// also wait till the X line of the chart is loaded
    var ctx = document.getElementById('chart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: xDate,
            datasets: [{
                label: label,
                data: xData,
                backgroundColor: [
                    'rgba(124, 59, 209, 0.2)'
                ],
                borderColor: [
                    'rgba(124, 59, 209, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                display: true,
                labels: {
                    fontSize: 16,
                    fontFamily: fontFamily,
                    fontWeight: 'bold'
                }
            }
        }
    });
    resetData()// reset the variables after creating the chart, in order to get new values
}
