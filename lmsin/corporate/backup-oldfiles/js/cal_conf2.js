
//Define calendar(s): addCalendar ("Unique Calendar Name", "Window title", "Form element's name", Form name")
//addCalendar("Calendar1", "Entered Date", "event_date_form", "frm");


addCalendar("Calendar1", "Entered Date", "c_date", "videofrm");  //JavaScript:showCal('Calendar6')
addCalendar("Calendar2", "Entered Date", "inv_bill_date", "inv_frm");  //JavaScript:showCal('Calendar6')
addCalendar("Calendar3", "Entered Date", "inv_consignment_date", "inv_frm");  //JavaScript:showCal('Calendar6')
addCalendar("Calendar4", "Entered Date", "form_bill_date", "form_frm");  //JavaScript:showCal('Calendar6')
addCalendar("Calendar5", "Entered Date", "form_received_on", "form_frm");  //JavaScript:showCal('Calendar6')
addCalendar("Calendar7", "Entered Date", "sale_dat", "sale_frm");  
addCalendar("Calendar8", "Entered Date", "bill_date", "report_frm");  
addCalendar("Calendar9", "Entered Date", "form_gr_date", "form_frm");  
addCalendar("Calendar10", "Entered Date", "form_receipt_date", "form_frm");
addCalendar("Calendar11", "Entered Date", "start_date", "form38_frm");
addCalendar("Calendar12", "Entered Date", "end_date", "form38_frm");
//JavaScript:showCal('Calendar6')


// default settings for English
// Uncomment desired lines and modify its values
// setFont("verdana", 9);
setWidth(90, 1, 15, 1);
// setColor("#cccccc", "#cccccc", "#ffffff", "#ffffff", "#333333", "#cccccc", "#333333");
// setFontColor("#333333", "#333333", "#333333", "#ffffff", "#333333");
setFormat("dd/mm/yyyy");
// setSize(200, 200, -200, 16);

// setWeekDay(0);
// setMonthNames("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
// setDayNames("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
 setLinkNames("[Close]", "[Clear]");
