
"use strict";

// styling accomodations
document.querySelectorAll(".check").forEach(item => {
    item.addEventListener("click", event => {
        event.target.parentElement.classList.toggle("checkedOpt");
    })
})

// styling view
document.addEventListener("change", function view(event) {
    if (event.target.matches('.radio') || event.target.closest('.radio')) {
        if (event.checked = true) {
            event.target.parentElement.classList.add("checkedOpt");

            document.querySelectorAll(".radio").forEach(function (event) {
                if (!event.checked) {
                    event.parentElement.classList.remove("checkedOpt");
                }
            })
        }
    }
})

// double room
document.addEventListener("click", function (e) {
    if (e.target.matches('.double') || e.target.closest('.double')) {
        let parentElem = e.target.parentElement.parentElement

        if ((e.checked = true) && (e.target.value === "2 Single Beds")) {
            // console.log("checked");
            parentElem.children[4].children[0].disabled = true;
            parentElem.children[4].children[0].checked = false;
            parentElem.children[4].classList.add("notAllowed");
        } else {
            parentElem.children[4].children[0].disabled = false;
            parentElem.children[4].classList.remove("notAllowed");
        }
    }
})

//pension event listener
document.addEventListener("change", function (e) {
    if (e.target.matches('.board') || e.target.closest('.board')) {
        let parentElem = e.target.parentElement;
        let boardName = (e.target.name) + "-half";

        if (e.target.value === "Half") {

            let halfBoard = `<select name="${boardName}" class="booking-input half-board"><option value="" selected hidden>Select</option><option value="Breakfast&Lunch">Breakfast + Lunch</option><option value="Breakfast&Dinner">Breakfast + Dinner</option></select>`

            e.target.parentElement.insertAdjacentHTML('beforeEnd', halfBoard);
        } else if ((e.target.value !== "half") && (parentElem.lastChild.classList.contains("half-board"))) {
            parentElem.removeChild(parentElem.lastChild);
        }
    }
})


document.getElementById("first-page").addEventListener("click", function () {
    document.getElementById('accom-num').innerHTML = "";
    document.getElementById("accom-cond").style.display = "none";
    document.getElementById('s-rooms').innerHTML = "";
    document.getElementById('d-rooms').innerHTML = "";
    let checkedAccom = document.querySelectorAll(".check:checked");

    for (let i = 0; i < checkedAccom.length; ++i) {

        // Create container
        let container = document.createElement("div");
        document.getElementById('accom-num').appendChild(container);

        // Create buttons
        let addSubDiv = `<div class="addSub-btn"><button type = "button" class="btn-action" onclick = "booking(this)" >–</button ><div value="${checkedAccom[i].value}" class='content' name="output">0 ${checkedAccom[i].value}</div><button type="button" class="btn-action" onclick="booking(this)">+</button></div >`;

        let camelCase = checkedAccom[i].value.replaceAll(' ', '');

        let hiddenInput = `<input type="hidden" name="${camelCase}-nmbr" value="" />`
        container.innerHTML = addSubDiv + hiddenInput;
    }
})


let addNewDoubRoom = true;
let addNewSingRoom = true;
let removeDoubRoom = true;
let removeSingRoom = true;

function booking(element) {
    document.getElementById("accom-cond").style.display = "grid";

    let operator = element.textContent.trim();
    let output = (element.previousElementSibling) ? element.previousElementSibling : element.nextElementSibling;
    let nmbr = output.textContent.trim().charAt(0);
    let accom = output.textContent.trim().slice(1);
    let parentDiv = output.parentElement.nextElementSibling;
    console.log(parentDiv);

    if (operator === "+") {

        (accom.endsWith("s")) ? accom = accom.slice(1, -1) : accom = accom.slice(1, accom.length);
        let firstWord = accom.replaceAll(' ', '');

        switch (true) {
            case nmbr < 4 && accom === "Single Room":
            case nmbr < 4 && accom === "Single Rooms":
                addNewSingRoom = true;
                break;
            case nmbr < 4 && accom === "Double Room":
            case nmbr < 4 && accom === "Double Rooms":
                addNewDoubRoom = true;
                break;
        }

        if (nmbr < 4) {
            ++nmbr;
            output.innerHTML = (nmbr > 1 && accom.slice(-1) != 's') ? nmbr + " " + accom + 's' : nmbr + " " + accom;
        }
        else {
            output = 4 + accom;
        }
        //hidden input value
        parentDiv.value = nmbr;
        console.log(parentDiv);

        let label = `<label class="fill-row">${accom} ${nmbr}</label>`

        let view = `<label class="checkOpt"><input class="radio" value="Internal View" name="${firstWord}-view-${nmbr}" type="radio">Internal View</label><label class="checkOpt"><input class="radio" value="External View" name="${firstWord}-view-${nmbr}" type="radio">External View</label>`;

        let doubRoom = `<label class="checkOpt"><input class="radio double" value="Double Bed" name="${firstWord}-${nmbr}" type="radio">Double Bed</label><label class="checkOpt"><input class="radio double" value="2 Single Beds" name="${firstWord}-${nmbr}" type="radio">2 Single Beds</label>`;

        let board = `<select name="${firstWord}-${nmbr}-board" class="booking-input board"><option value="" selected hidden>Select Board</option><option value="Full">Full Board</option><option value="Half">Half Board</option><option value="None">None</option></select>`

        switch (true) {

            case accom === "Single Room" && nmbr > 0 && nmbr <= 4 && addNewSingRoom:

                document.getElementById("s-rooms").style.display = "grid";

                let srContainer = document.createElement("div");
                srContainer.className = "room-row";
                document.getElementById('s-rooms').appendChild(srContainer);
                srContainer.innerHTML = label + view + board;

                srContainer.scrollIntoView();

                if (nmbr === 4) {
                    addNewSingRoom = false;
                }
                break;

            case accom === "Double Room" && nmbr > 0 && nmbr <= 4 && addNewDoubRoom:

                document.getElementById("d-rooms").style.display = "grid";

                let drContainer = document.createElement("div");
                drContainer.className = "room-row";
                document.getElementById('d-rooms').appendChild(drContainer);
                drContainer.innerHTML = label + doubRoom + view + board;

                drContainer.scrollIntoView();

                if (nmbr === 4) {
                    addNewDoubRoom = false;
                }
                break;
        }
    }
    else {

        (accom.endsWith("s")) ? accom = accom.slice(1, -1) : accom = accom.slice(1, accom.length);

        switch (true) {
            case nmbr > 0 && accom === "Single Room":
                removeSingRoom = true;
                break;
            case nmbr > 0 && accom === "Double Room":
                removeDoubRoom = true;
                break;
        }

        if (nmbr > 0) {
            --nmbr;
            output.innerHTML = (nmbr < 2) ? nmbr + " " + accom : nmbr + " " + accom + "s";
        }
        else {
            nmbr = 0;
        }

        //hidden input value
        parentDiv.value = nmbr;
        console.log(parentDiv);

        switch (true) {
            case accom === "Single Room" && nmbr >= 0 && removeSingRoom:

                document.getElementById("s-rooms").removeChild(document.getElementById("s-rooms").lastChild);

                if (nmbr === 0) {
                    removeSingRoom = false;
                    document.getElementById("s-rooms").style.display = "none";
                } else {
                    document.getElementById("s-rooms").lastChild.scrollIntoView();
                }

                break;

            case accom === "Double Room" && nmbr >= 0 && removeDoubRoom:
                document.getElementById("d-rooms").removeChild(document.getElementById("d-rooms").lastChild);

                if (nmbr === 0) {
                    removeDoubRoom = false;
                    document.getElementById("d-rooms").style.display = "none";
                } else {
                    document.getElementById("d-rooms").lastChild.scrollIntoView();
                }
                break;
        }

    }

    let singRoomCount = document.getElementById("s-rooms").childElementCount;
    let doubRoomCount = document.getElementById("d-rooms").childElementCount

    if (singRoomCount === 0 && doubRoomCount === 0) {
        document.getElementById("accom-cond").style.display = "none";
    }
}

document.getElementById("scnd-page").addEventListener("click", function (element) {

    document.getElementById("form-sec-3").innerHTML = "";

    // Create buttons
    let addSubDiv = `<div class="addSub-btn"><button type = "button" class="btn-action child-num">–</button ><div value="" class="content" name="children">0 Children</div><button type="button" class="btn-action child-num">+</button></div >`;

    //hidden input
    let hiddenChildrenNum = `<input type="hidden" name="Children-nmbr" value="O" />`

    //Create children div
    let childrenAges = `<div id="children-ages"></div>`;

    document.getElementById("form-sec-3").innerHTML = addSubDiv + hiddenChildrenNum + childrenAges;
})


let addChild = true;
let removeChild = true;

document.addEventListener("click", function (e) {

    if (e.target.matches('.child-num') || e.target.closest('.child-num')) {

        let operator = e.target.innerHTML;
        let output = (e.target.previousElementSibling) ? e.target.previousElementSibling : e.target.nextElementSibling;
        let nmbr = output.textContent.trim().charAt(0);

        switch (true) {
            case nmbr < 8:
                addChild = true;
                break;
            case nmbr > 0:
                removeChild = true;
                break;
        }

        console.log("Add Activated >>> " + addChild);
        console.log("Drop Activated >>> " + removeChild);

        switch (true) {
            case operator === "+" && nmbr >= 0 && addChild:

                // document.getElementById("children-ages").style.display = "grid";

                ++nmbr;

                let addChildDiv = `<div class="child-age"><label class="fill-row">Age of Child ${nmbr}</label><select class="booking-input" type="text" name="child-${nmbr}"><option selected hidden>Select Age Range</option><option value="2yo & under">9 months - 2 years old</option><option value="2 - 14yo">2 - 14 years old</option><option value="14 - 17yo">14 - 17 years old</option></div>`;

                document.getElementById("children-ages").insertAdjacentHTML('beforeEnd', addChildDiv);
                output.innerHTML = nmbr + " Children";
                document.getElementById("children-ages").lastChild.scrollIntoView();

                if (nmbr === 8) {
                    addChild = false;
                    console.log("We are at 8 >>> " + addChild);
                }
                break;

            case operator === "–" && nmbr <= 8 && removeChild:
                --nmbr;
                output.innerHTML = nmbr + " Children";
                document.getElementById("children-ages").removeChild(document.getElementById("children-ages").lastChild);

                if (nmbr === 0) {
                    removeChild = false;
                    console.log("We are at 0 >>> " + removeChild);
                } else {
                    document.getElementById("children-ages").lastChild.scrollIntoView();
                }

                break;

        }

        //add nmbr of children to hidden input
        e.target.parentElement.parentElement.children[1].value = nmbr;
        console.log(e.target.parentElement.parentElement.children[1]);

    }
})

//children age options
document.addEventListener("change", function (e) {
    if (e.target.matches('.child-age') || e.target.closest('.child-age')) {

        let parentElem = e.target.parentElement;
        let childName = (e.target.name) + "-opt";

        let underTwo = `<option value="" selected hidden>Select Option</option><option value="Add bed 25%">Additional Bed</option><option value="No Additional bed">No Additional Bed</option>`;

        let twoToTwelve = `<option value="" selected hidden>Select Option</option><option value="+50%">+50% of Double Room Price</option>`;

        let overFourteen = `<option value="" selected hidden>Select Option</option><option value="Add bed 70%">Additional Bed</option><option value="Add room">Add a Single Room</option>`;

        if (!parentElem.lastChild.classList.contains("child-opt")) {
            let select = document.createElement('select');
            select.className = "booking-input child-opt";
            select.name = childName;
            parentElem.appendChild(select);
        }

        switch (true) {
            case e.target.value === "2yo & under":
                parentElem.lastChild.innerHTML = underTwo;
                break;

            case e.target.value === "2 - 14yo":
                parentElem.lastChild.innerHTML = twoToTwelve;
                break;

            case e.target.value === "14 - 17yo":
                parentElem.lastChild.innerHTML = overFourteen;
                break;
        }

    }
})

