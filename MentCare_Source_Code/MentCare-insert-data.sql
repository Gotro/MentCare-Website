insert into users(userID, `userFirstName`,`userLastName`)
values (0001, 'Bob', 'Dale');


insert into users(userID, `userFirstName`,`userLastName`)
values (0002, 'Sean', 'Badurina');

insert into users(userID, `userFirstName`,`userLastName`)
values (0003, 'Bill', 'rick');

insert into users(userID, `userFirstName`,`userLastName`)
values (0004, 'yuki', 'zhang');

insert into userroles(userID, `userPosition`, userpassword)
values (0001, 'patient', 'workwork');

insert into userroles(userID, `userPosition`, userpassword)
values (0002, 'doctor', 'tomato');

insert into userroles(userID, `userPosition`, userpassword)
values (0003, 'nurse', 'asdf');


insert into userroles(userID, `userPosition`, userpassword)
values (0004, 'manager',  'asdf1234');

insert into appointments(appointmentID, situation, `attendenceStatus`, costs,dates)
values (0001, 'had a cold', 'arrived on time', 100,'20191115');

insert into appointments(appointmentID, situation, `attendenceStatus`, costs,dates)
values (0002, 'had the flu', 'arrived on time', 100,'20191116');

insert into appointments(appointmentID, situation, `attendenceStatus`, costs,dates)
values (0003, 'cancer, was given chemo', 'arrived on time', 10000, '20191120');
insert into appointments(appointmentID, situation, `attendenceStatus`, costs,dates)
values (0004, 'cold', 'arrived on time', 100, '20191117');
insert into appointments(appointmentID, situation, `attendenceStatus`, costs,dates)
values (0005, 'cold', 'arrived on time', 100,'20191118');






insert into patientinfo(appointmentID, `homeAddress`, height, weight, `inOut`, sectioned, `historyID`, `userID` )
values ( 0001, '432 bob rd', 74, 180, 'in', 'not sectioned', 0001, 0001 );

insert into patientinfo(appointmentID, `homeAddress`, height, weight, `inOut`, sectioned, `historyID`, `userID` )
values ( 0001, '432 bob rd', 74, 180, 'in', 'not sectioned', 0002, 0001 );

insert into patientinfo(appointmentID, `homeAddress`, height, weight, `inOut`, sectioned, `historyID`, `userID` )
values ( 0002, '432 bob rd', 74, 180, 'in', 'not sectioned', 0002, 0001 );


insert into patientinfo(appointmentID, `homeAddress`, height, weight, `inOut`, sectioned, `historyID`, `userID` )
values ( 0003, '9807 idk rd', 52, 130, 'in', 'not sectioned', 0003, 0002 );

insert into patientinfo(appointmentID, `homeAddress`, height, weight, `inOut`, sectioned, `historyID`, `userID` )
values ( 0004, '789 asdf rd', 60, 140, 'in', 'not sectioned', 0004, 0003 );

insert into patientinfo(appointmentID, `homeAddress`, height, weight, `inOut`, sectioned, `historyID`, `userID` )
values ( 0005, '789 asdf rd', 65, 145, 'in', 'not sectioned', 0005, 0004 );

insert into calendar(dates, availability, `userID`)
values ('20191115', "unavailable", 0001);

insert into calendar(dates, availability, `userID`)
values ('20191116', "unavailable", 0002);

insert into calendar(dates, availability, `userID`)
values ('20191117', "unavailable", 0003);

insert into medication(medicationID, medication, `averageDose`, `use`)
values(0001,"advil","2 for adult 1 for child", "headaches, pain");

insert into medication(medicationID, medication, `averageDose`, `use`)
values(0002,"asprin","2 for adult 1 for child", "headaches, pain");

insert into inventory(inventoryID, medication, `date`, medicationid, medicationcount)
values (1234,'advil', '20191115', 0001, 200);

insert into inventory(inventoryID, medication, `date`, medicationid, medicationcount)
values (1235,'advil', '20191116', 0001, 195);

insert into inventory(inventoryID, medication, `date`, medicationid, medicationcount)
values (1236,'asprin', '20191116', 0002, 400);


insert into inventory(inventoryID, medication, `date`, medicationid, medicationcount)
values (1237,'asprin', '20191115', 0002, 410);
