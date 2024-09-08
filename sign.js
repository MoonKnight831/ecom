  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.13.1/firebase-app.js";
//   import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.13.1/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyAYwe204QOaYLWLkd1KcfrjCtWvrvNNB5w",
    authDomain: "valco-8f7e4.firebaseapp.com",
    projectId: "valco-8f7e4",
    storageBucket: "valco-8f7e4.appspot.com",
    messagingSenderId: "426666291477",
    appId: "1:426666291477:web:cc94a8a7709fac885b791c",
    measurementId: "G-HTZE536R8F"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
//   const analytics = getAnalytics(app);