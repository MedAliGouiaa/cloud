function toggleColor() {
    var icon = document.getElementById('icon');
    icon.classList.toggle('clicked');
}
function toggleLike(discussionId) {
    let likeCountElement = document.getElementById('like-count-' + discussionId);
    let likeIcon = likeCountElement.previousElementSibling;

    // Assuming you have fetched the initial liked status of the discussion from the database
    let isLiked = likeIcon.classList.contains('liked');
    let likeCount = parseInt(likeCountElement.textContent);

    if (isLiked) {
        likeCount--;
    } else {
        likeCount++;
    }

    // Update the like count
    likeCountElement.textContent = likeCount;

    // Toggle the liked class for the icon
    likeIcon.classList.toggle('liked');

    // Update the liked status in the database using AJAX if needed
}
function temps_ecoule(date_post) {
    // Convert the publication date to a JavaScript Date object
    var datePost = new Date(date_post);
    // Get the current date and time
    var currentDate = new Date();
    // Calculate the difference between the two dates in milliseconds
    var difference = currentDate - datePost;
    // Convert the difference to seconds
    var secondsDifference = Math.floor(difference / 1000);

    // Generate the elapsed time text based on the difference
    var years = Math.floor(secondsDifference / (60 * 60 * 24 * 365));
    var months = Math.floor(secondsDifference / (60 * 60 * 24 * 30));
    var days = Math.floor(secondsDifference / (60 * 60 * 24));
    var hours = Math.floor(secondsDifference / (60 * 60));
    var minutes = Math.floor(secondsDifference / 60);

    if (years > 0) {
        return years + " year(s) ago";
    } else if (months > 0) {
        return months + " month(s) ago";
    } else if (days > 0) {
        return days + " day(s) ago";
    } else if (hours > 0) {
        return hours + " hour(s) ago";
    } else if (minutes > 0) {
        return minutes + " minute(s) ago";
    } else {
        return "Just now";
    }
}
function moveToNext(input, nextField) {
    if (input.value.length === input.maxLength) {
        if (nextField === 'month') {
            if (parseInt(input.value, 10) > 31) {
                document.getElementById('dayError').innerText = "Journée impossible";
                input.value = '';
                return;
            } else {
                document.getElementById('dayError').innerText = "";
            }
        } else if (nextField === 'year') {
            if (parseInt(input.value, 10) > 12) {
                document.getElementById('monthError').innerText = "Mois impossible";
                input.value = '';
                return;
            } else {
                document.getElementById('monthError').innerText = "";
            }
        }
        
        document.getElementById(nextField).focus();
    }
}

function checkYearInput(input) {
    const inputValue = parseInt(input.value, 10);
    const currentYear = 2024; 
    if (input.value.length === input.maxLength) {
        if (inputValue > currentYear) {
            console.log("Year Error: Année impossible");
            document.getElementById('yearError').innerText = "Année impossible";
            input.value = '';
        } else {
            console.log("No Year Error");
            document.getElementById('yearError').innerText = "";
        }
    }
}
function goBack() {
    window.history.back();
}


