// Use map to filter out arrays based on day of the week

const { data } = require("autoprefixer");
let daysoftheweek = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];

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