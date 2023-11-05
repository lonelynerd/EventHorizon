const urlCheckObj = new RegExp("^http:\/\/adecampus\.univ-rouen\.fr\/jsp\/custom\/modules\/plannings\/anonymous_cal\.jsp\?resources=[0-9]+&projectId=[0-9]+&calType=.*&nbWeeks=[0-9]+&displayConfigId=[A-Za-z0-9]+$","gm");

export function chooseCalendar() {
    let url = prompt("Input your calendar's link below :");
    if(url === null){
        return false;
    }
    /*if (!urlCheckObj.test(url)) {
      alert("Invalid URL. Please try again.");
      return false;
    }*/
    window.location.href = "?url=" + encodeURIComponent(url);
    return true;
}

export function convertDate(date, ishour) {
    if (typeof date != "string") {
        return false;
    }
    let expr = ishour ? "^([0-9]{2})_([0-9]{2})$" : "^([0-9]{4})_([0-9]{1,2})_([0-9]{1,2})_([A-Za-z]{3})$";
    let res = date.match(expr);
    if (res === null) {
        return false
    }
    return ishour ? `${res[1]}:${res[2]}` : `${res[4]} ${res[3]}/${res[2]}`;
}