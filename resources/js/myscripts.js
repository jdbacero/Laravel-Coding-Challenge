// Use map to filter out arrays based on day of the week

const { data } = require("autoprefixer");
var daysoftheweek = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
var month_year = document.getElementById('month_year');
var calendar_element = document.getElementById('main_calendar');
var set_event_button = document.getElementById('add_event');

month_year.addEventListener('input', () => {
    let month = month_year.value.substring(5, 7) - 1;
    let year = month_year.value.substring(0,4);
    calendar_element.innerHTML = '';

    let dataset = getMonthDataset(month, year);    
    let data = generateMonth(dataset);
    console.log(`Year is ${year} and month is ${month}`);
    console.log(dataset);

    data.days.forEach((item, index) => {
        // console.log(item);
        calendar_element.innerHTML += `
        <div class="flex">
            <div class="w-16 flex-initial">
                ${item}
            </div>
            <div class="w-64 flex-initial">
                ${data.daysoftheweek[index]}
            </div class="flex-initial">
            <div class="flex-initial">
                Event goes here
            </div>
        </div>

        `;
    });
});

/**
 * @param {int} The month number, 0 based
 * @param {int} The year, not zero based, required to account for leap years
 * @return {Date[]} List with date objects for each day of the month
 */
window.getMonthDataset = (month, year) => {
    var date = new Date(year, month, 1);
    var days = [];
    while (date.getMonth() === month) {
      days.push(new Date(date));
      date.setDate(date.getDate() + 1);
    }
    
    return days;
}

/**
 * @param {Date[]} Returned dataset from getMonthDataset()
 * @return {Array} Object with day and day of the week of a specific month
 */
window.generateMonth = (dataset) => {
    let days = dataset.map((data) => data.getDate());
    let dofweek = dataset.map((data) => daysoftheweek[data.getDay()]);
    let mydataset = {
        days: days,
        daysoftheweek: dofweek,
    };
    
    return mydataset;
}

window.setEvent = () => {
    // First, let's get the FROM and TO dates, event, and checkboxes.
    let calendar_from = new Date(document.getElementById('calendar_from').value);
    let calendar_to = new Date(document.getElementById('calendar_to').value);
    let myevent = document.getElementById('event_name').value;

    //Changed as this actually returns a node
    // let daysoftheweek = document.querySelectorAll('input[name="dayoftheweek"]:checked');

    let daysoftheweek = [...document.querySelectorAll('input[name="dayoftheweek"]:checked')]; //This is an array
    let dofweek = daysoftheweek.map(x => x.value); //Base 0 days of the week value

    // Then, let's catch some simple errors
    if ((calendar_to < calendar_from) || !calendar_from || !calendar_to) {
        alert(`Invalid date inputs.`);
        return;
    }
    if (!daysoftheweek.length) {
        alert('Please select any of the days of the week.');
        return;
    }

    // Let us get an array of dates between the two dates (from and to)
    let mydates = getDates(calendar_from, calendar_to, dofweek);

    console.log(mydates);
    console.log(dofweek)

    // Send post request with Axios to save data
    axios.post(window.location.origin + '/save', {
        event: myevent,
        dates: mydates
    })
    .then(res => {
        // Do some stuff after success
        console.log(res);
    })
    .catch(err => {
        // Do some stuff if error
        alert("An error has occured: " + err);
    });
}

// Attach click event to function
add_event.addEventListener('click', setEvent);

/**
 * @param {Date()} Start date
 * @param {Date()} Stop date
 * @param {Array} Array values of days of the week
 * @return {Date[]} Returns a list of dates in between the date params
 */
function getDates(startdate, stopdate, daysoftheweek) {
    let myarray = [];
    for (let currentdate = startdate; currentdate <= stopdate; currentdate.setDate(currentdate.getDate() + 1)) {
        let newdate = new Date(currentdate.getTime());

        if(daysoftheweek.includes(`${newdate.getDay()}`)) {
            console.log("test");

            // Format for MySql datetime format
            myarray.push(newdate.toISOString().slice(0, 19).replace('T', ' '));
        }
    }

    // console.log(myarray);
    return myarray;
}