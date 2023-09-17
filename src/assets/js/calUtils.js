const urlCheckObj = new RegExp("^https:\/\/adecampus\.univ-rouen\.fr\/jsp\/custom\/modules\/plannings\/anonymous_cal\.jsp\?resources=([0-9]+)&projectId=([0-9]+)&calType=(.*)&nbWeeks=([0-9]+)&displayConfigId=([0-9]+)$");

export function showMenuUnusual(id) {
    let elem = document.getElementById(id);
    if (elem === null) {
        return false;
    }
    elem.style.display = "block";
}

export function chooseCalendar() {
    let url = prompt("Input your calendar's link below :");
    /*if (!urlCheckObj.test(url)) {
      //console.log(url);
      alert("Invalid URL. Please try again.");
      return false;
    }*/
    window.location.href = "?url=" + encodeURIComponent(url);
    return true;
}

export function convertDate(date, ishour) {
    if (typeof date != "string") {
        //console.log(date);
        //return typeof date;
        return false;
    }
    let expr = ishour ? "^([0-9]{2})_([0-9]{2})$" : "^([0-9]{1,2})_([0-9]{1,2})_([0-9]{4})_([A-Za-z]{3})$";
    let res = date.match(expr);
    if (res === null) {
        return false
    }
    return ishour ? `${res[1]}:${res[2]}` : `${res[4]} ${res[1]}/${res[2]}`;
}