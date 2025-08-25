// Firebase Push Notification start

    // Import the functions you need from the SDKs you need
    import { initializeApp } from "firebase/app";
    import { getAnalytics } from "firebase/analytics";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
      apiKey: "AIzaSyAmcV57AQ-vBuJle0H0BTMJ3hXOGQxTq7Y",
      authDomain: "lobalmart-com-cc8a0.firebaseapp.com",
      projectId: "lobalmart-com-cc8a0",
      storageBucket: "lobalmart-com-cc8a0.firebasestorage.app",
      messagingSenderId: "153398968537",
      appId: "1:153398968537:web:544f81f17d0da892887ec8",
      measurementId: "G-BM6F41WP0D"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);
    const messaging = getMessaging(app);

    const swUrl = new URL('sw.js', location.origin).href;
    let registration;
    navigator.serviceWorker.register(swUrl).then(registration => {

        registration = registration;
        getToken(messaging, {
            serviceWorkerRegistration: registration,
            vapidKey: 'BKXwUFklz55LF30qK1Dy0-QVEoVD8fVhUpZXmc6R8OtUN2GmE97cBYaQF1nOoQjq31lBFSKG7w7Czl2h32aBsek' }).then((currentToken) => {
            if (currentToken) {
                console.log("Token is: "+currentToken);
                document.cookie = 'notification_token = ' + currentToken;
                // Send the token to your server and update the UI if necessary
                // ...
            } else {
                // Show permission request UI
                console.log('No registration token available. Request permission to generate one.');
                // ...
            }
        }).catch((err) => {
            console.log('An error occurred while retrieving token. ', err);
            // ...
        });
    });

    // Get the add button element
      let addBtn = document.querySelector('.add-button');

      // Initially hide the add button
      addBtn.style.display = 'none';

      // Variable to store the deferred prompt event
      let deferredPrompt;

      // Listen for the beforeinstallprompt event
      window.addEventListener('beforeinstallprompt', (e) => {
        console.log('beforeinstallprompt event triggered');
        // Prevent the default prompt from showing
        e.preventDefault();
        // Store the event for later use
        deferredPrompt = e;
        // Show the add button
        addBtn.style.display = 'block';
      });

      // Listen for clicks on the add button
      addBtn.addEventListener('click', () => {
        // Hide the add button
        addBtn.style.display = 'none';
        // If the deferred prompt is available, show it
        if (deferredPrompt) {
          console.log('deferredPrompt is available');
          deferredPrompt.prompt();
          // Handle the user's choice
          deferredPrompt.userChoice.then((choiceResult) => {
            if (choiceResult.outcome === 'accepted') {
              console.log('User accepted the A2HS prompt');
            } else {
              console.log('User dismissed the A2HS prompt');

              // Listen for scroll events
                window.addEventListener('scroll', () => {
                  // Show the add button if the user has scrolled down
                  if (window.scrollY > 0) {
                    addBtn.style.display = 'block';
                  } else {
                    // Hide the add button if the user is at the top of the page
                    addBtn.style.display = 'none';
                  }
                });
            }
            // Reset the deferred prompt variable
            deferredPrompt = null;
          });
        } else {
          console.log('deferredPrompt is not available');
          // If the deferred prompt is not available, show a manual add message
          alert('Please add this app to your home screen manually.');

          // Listen for scroll events
                window.addEventListener('scroll', () => {
                  // Show the add button if the user has scrolled down
                  if (window.scrollY > 0) {
                    addBtn.style.display = 'block';
                  } else {
                    // Hide the add button if the user is at the top of the page
                    addBtn.style.display = 'none';
                  }
                });
        }
      });

      

  

// Notification Permission Start 

    // const notificationButton = document.getElementById("enableNotifications");
    let swRegistration = null;
    const TokenElem = document.getElementById("token");
    const ErrElem = document.getElementById("err");



      let notificationButton = document.getElementById('enableNotifications');

    // function initializeUi() {
    //   notificationButton.addEventListener("click", () => {
    //     displayNotification();
    //   });
    // }

    function initializeFCM() {
      try {
        Notification.requestPermission()
          .then(permission => {
            if (permission === 'granted') {
              console.log("Notification permission granted.");
            } else {
              console.log("Unable to get permission to notify.");
            }
          })
          .catch(err => {
            console.log("Error requesting permission:", err);
          });
      } catch (error) {
        console.log("Error requesting permission:", error);
      }
    }

    // Add this function to request permission using the navigator.permissions API
    function requestPermission() {
      navigator.permissions.query({ name: 'notifications' })
        .then(permission => {
          if (permission.state === 'granted') {
            console.log("Notification permission granted.");
          } else {
            console.log("Unable to get permission to notify.");
          }
        })
        .catch(err => {
          console.log("Error requesting permission:", err);
        });
    }

    // initializeUi();
    initializeFCM();

    // Call the requestPermission function in addition to initializeFCM
    requestPermission();

