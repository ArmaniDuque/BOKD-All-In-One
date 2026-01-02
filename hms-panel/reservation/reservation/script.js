function togglemanualrate() {
    document.getElementById('rate').disabled = true;
    var checkbox = document.getElementById('manualrate');
    var textbox = document.getElementById('rate');
    var manurate = document.getElementById("manurate");

    if (!checkbox.checked && manurate.style.display === "block") {
        manurate.style.display = "none";
        textbox.style.display = "block";
        textbox.disabled = true;
    } else {
        manurate.style.display = "block";
        textbox.style.display = "none";
        textbox.disabled = false;
    }
}

function togglechangeratecode() {
    document.getElementById('dratecodeid').disabled = true;
    document.getElementById('droomtypeid').disabled = true;
    document.getElementById('droomnumber').disabled = true;
    var changeratecode = document.getElementById('changeratecode');
    var dratecodeid = document.getElementById('dratecodeid');
    var droomtypeid = document.getElementById('droomtypeid');
    var droomnumber = document.getElementById("droomnumber");
    var roomnumber = document.getElementById("roomnumber");
    var roomtypeid = document.getElementById("roomtypeid");
    var ratecodeid = document.getElementById("ratecodeid");

    if (!changeratecode.checked) {
   
           dratecodeid.style.display = "block";
        droomtypeid.style.display = "block";
        droomnumber.style.display = "block";
        roomnumber.style.display = "none";
        roomtypeid.style.display = "none";
        ratecodeid.style.display = "none";
        roomnumber.disabled = true;
        roomtypeid.disabled = true;
        ratecodeid.disabled = true;
      
    } else {
      
          dratecodeid.style.display = "none";
        droomtypeid.style.display = "none";
        droomnumber.style.display = "none";
        roomnumber.style.display = "block";
        roomtypeid.style.display = "block";
        ratecodeid.style.display = "block";
        roomnumber.disabled = false;
        roomtypeid.disabled = false;
        ratecodeid.disabled = false;

    }
}

document.addEventListener('DOMContentLoaded', function() {
    const checkinDate = document.getElementById('checkindate');
    const checkoutDate = document.getElementById('checkoutdate');
    const noofnights = document.getElementById('noofnights');
    const noofrooms = document.getElementById('noofrooms');
    const ratecodeSelect = document.getElementById('ratecodeid');
    const roomtypeSelect = document.getElementById('roomtypeid');
    const roomnumberSelect = document.getElementById('roomnumber');
    const rateInput = document.getElementById('rate');
    const adultsInput = document.getElementById('adults'); // Added
    const kidsInput = document.getElementById('kids'); // Added

   
//   // Set minimum check-in date to today
//                                     const today = new Date().toISOString().split('T')[0];
//                                     checkinDate.min = today;


    fetch('get_ratecodes.php')
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                const firstRateCode = data[0];
                data.forEach(ratecode => {
                    const option = document.createElement('option');
                    option.value = ratecode.id;
                    option.textContent = ratecode.code;
                    ratecodeSelect.appendChild(option);
                });
                ratecodeSelect.value = firstRateCode.id;
                fetchRoomTypes(firstRateCode.id);
            }
        })
        .catch(error => console.error("Error fetching ratecodes:", error));

    function fetchRoomTypes(ratecodeId) {
        fetch(`get_roomtypes.php?ratecodeid=${ratecodeId}`)
            .then(response => response.json())
            .then(data => {
                const roomtypeSelect = document.getElementById('roomtypeid');
                roomtypeSelect.innerHTML = '<option value="">Select Room Type</option>';
                data.forEach(roomtype => {
                    const option = document.createElement('option');
                    option.value = roomtype.id;
                    option.textContent = roomtype.code;
                    roomtypeSelect.appendChild(option);
                });
            })
            .catch(error => console.error("Error fetching roomtypes:", error));
    }

    function updateDates() {
        if (checkinDate.value && checkoutDate.value) {
            const startDate = new Date(checkinDate.value);
            const endDate = new Date(checkoutDate.value);
            const timeDiff = endDate.getTime() - startDate.getTime();
            const daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));
            noofnights.value = daysDiff;
        }
    }

    checkinDate.addEventListener('change', function() {
        const nights = parseInt(noofnights.value);
        if (!isNaN(nights) && nights > 0) {
            const startDate = new Date(checkinDate.value);
            const newEndDate = new Date(startDate);
            newEndDate.setDate(startDate.getDate() + nights);
            checkoutDate.valueAsDate = newEndDate;
        }
        updateDates();
        const checkinDateValue = new Date(checkinDate.value);
        checkoutDate.min = checkinDateValue.toISOString().split('T')[0];
        updateRate();
    });

    checkoutDate.addEventListener('change', updateDates);

    noofnights.addEventListener('change', function() {
        if (checkinDate.value && noofnights.value) {
            let nights = parseInt(noofnights.value);
            if (nights < 1) {
                nights = 1;
                noofnights.value = 1;
            }
            const startDate = new Date(checkinDate.value);
            const newEndDate = new Date(startDate);
            newEndDate.setDate(startDate.getDate() + nights);
            checkoutDate.valueAsDate = newEndDate;
            checkoutDate.min = startDate.toISOString().split('T')[0];
        }
    });

    noofrooms.addEventListener('change', function() {
        if (parseInt(this.value) > 1) {
            roomnumberSelect.disabled = true;
        } else {
            roomnumberSelect.disabled = false;
            roomnumberSelect.value = "";
        }
    });

    ratecodeSelect.addEventListener('change', function() {
        const ratecodeId = this.value;
        fetch(`get_roomtypes.php?ratecodeid=${ratecodeId}`)
            .then(response => response.json())
            .then(data => {
                roomtypeSelect.innerHTML = '<option value="">Select Room Type</option>';
                data.forEach(roomtype => {
                    const option = document.createElement('option');
                    option.value = roomtype.id;
                    option.textContent = roomtype.code;
                    roomtypeSelect.appendChild(option);
                });
                roomnumberSelect.innerHTML = '<option value="">Select Room Number</option>';
                rateInput.value = '';
                adultsInput.value = ''; // Clear adults
                kidsInput.value = ''; // Clear kids
            })
            .catch(error => console.error("Error fetching roomtypes:", error));
    });

    roomtypeSelect.addEventListener('change', function() {
        const roomtypeId = this.value;
        fetch(`get_roomnumbers.php?roomtypeid=${roomtypeId}`)
            .then(response => response.json())
            .then(data => {
                roomnumberSelect.innerHTML = '<option value="">Select Room Number</option>';
                data.forEach(room => {
                    const option = document.createElement('option');
                    option.value = room.roomnumber;
                    option.textContent = room.roomnumber;
                    roomnumberSelect.appendChild(option);
                });
                rateInput.value = '';
                // Fetch and set adult and kid counts
                fetch(`get_roomtypes.php?ratecodeid=${ratecodeSelect.value}`)
                    .then(response => response.json())
                    .then(roomtypes => {
                        const selectedRoomType = roomtypes.find(room => room.id === parseInt(roomtypeId));
                        if (selectedRoomType) {
                            adultsInput.value = selectedRoomType.adults;
                            kidsInput.value = selectedRoomType.kids;
                        }
                    })
                    .catch(error => console.error("Error fetching room type details:", error));
            })
            .catch(error => console.error("Error fetching roomnumbers:", error));
    });

    function updateRate() {
        if (checkinDate.value && ratecodeSelect.value && roomtypeSelect.value) {
            const dayOfWeek = new Date(checkinDate.value).toLocaleDateString('en-US', { weekday: 'long' }).toLowerCase();
            fetch(`get_rate.php?ratecodeid=${ratecodeSelect.value}&roomtypeid=${roomtypeSelect.value}&day=${dayOfWeek}`)
                .then(response => response.text())
                .then(rate => {
                    rateInput.value = rate;
                })
                .catch(error => console.error("Error fetching rate:", error));
        }
    }

    roomnumberSelect.addEventListener('change', updateRate);
});