async function fetchWeather() {
    try {
      let city = "Balatan"; // Set the city name by default
      let result = await fetch(
        `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=f0fc6fd6d2f04acb6841feaed8a541a5&units=metric`
      );
      let data = await result.json();
      forecast(data);
    } catch (err) {
      console.log(err);
    }
  }

  let date = new Date(); // Get the current date
  let newDay = date.getDay();
  let currentDate = formatDate(date); // Format the current date

  // Function to format the date as "Day, Month Day, Year"
  function formatDate(date) {
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    return date.toLocaleDateString('en-US', options);
  }

  // Function for fetching daily forecast data from OpenWeatherMap API
  async function forecast(data) {
    let lat = data.coord.lat;
    let lon = data.coord.lon;
    try {
      let result = await fetch(
        `https://api.openweathermap.org/data/2.5/onecall?lat=${lat}&lon=${lon}&appid=f0fc6fd6d2f04acb6841feaed8a541a5&units=metric`
      );
      let forecastData = await result.json();
      displayForecast(forecastData);
    } catch (err) {
      console.log(err);
    }
  }

  let dayObj = { 0: "", 1: "", 2: "", 3: "", 4: "", 5: "", 6: "" };

  function displayForecast(forecastData) {
    let data = forecastData.daily;
    let container = document.getElementById("forecast");
    let x = newDay;

    container.innerHTML = null;
    data.map(function (el, index) {
      let iconcode = el.weather[0].icon;
      let iconurl = "http://openweathermap.org/img/w/" + iconcode + ".png";
      let main = document.createElement("div");

      let day = document.createElement("h6");
      day.setAttribute("class", "day");
      day.innerText = dayObj[x++ % 7];

      // Convert the timestamp to a date string
      let date = new Date(el.dt * 1000); // Multiply by 1000 to convert to milliseconds
      let dateString = formatDate(date);

      let dateElement = document.createElement("h6");
      dateElement.innerText = dateString;

      let image = document.createElement("img");
      image.setAttribute("class", "image");
      image.src = iconurl;

      let minTem = document.createElement("h6");
      minTem.setAttribute("class", "min");
      minTem.innerText = +el.temp.min.toFixed(0) + "°C";

      let maxTem = document.createElement("h6");
      maxTem.setAttribute("class", "max");
      maxTem.innerText = +el.temp.max.toFixed(0) + "°C";

      if (index === 0) {
        main.classList.add("today"); 
      }

      main.append(day, dateElement, image, minTem, maxTem);
      container.append(main);
    });
  }

  // Trigger the weather fetch on page load
  fetchWeather();

