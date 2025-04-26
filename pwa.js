// "use strict";

// const notificationButton = document.getElementById("enableNotifications");
// let swRegistration = null;
// const TokenElem = document.getElementById("token");
// const ErrElem = document.getElementById("err");

// // Initialize Firebase
// // TODO: Replace with your project's customized code snippet
// const config = {
//   apiKey: "AIzaSyAQsVSjofHfiWHWqai-0shuFexPke1-NEQ",
//   authDomain: "doncen-1.firebaseapp.com",
//   databaseURL: "https://doncen-1.firebaseio.com",
//   projectId: "doncen-1",
//   storageBucket: "doncen-1.appspot.com",
//   messagingSenderId: "741021253190",
//   appId: "1:741021253190:web:569722f8de9679f5ffd447"
// };

// firebase.initializeApp(config);

// // Initialize Firebase Cloud Messaging and get a reference to the service
// const messaging = firebase.messaging();
// // const messaging = getMessaging(app);

// initializeApp();

// function initializeApp() {
//   if ("serviceWorker" in navigator && "PushManager" in window) {
//     console.log("Service Worker and Push is supported");
//     initializeUi();
//     initializeFCM();

//     //Register the service worker
//     navigator.serviceWorker
//       .register("/sw.js")
//       .then(swReg => {
//         console.log("Service Worker is registered", swReg);
//         swRegistration = swReg;
//       })
//       .catch(error => {
//         console.error("Service Worker Error", error);
//       });
//     navigator.serviceWorker.ready.then(function(registration) {
//       console.log("A service worker is active:", registration.active);

//       // At this point, you can call methods that require an active
//       // service worker, like registration.pushManager.subscribe()
//     });
//   } else {
//     console.warn("Push messaging is not supported");
//     notificationButton.textContent = "Push Not Supported";
//   }
// }

// function initializeUi() {
//   notificationButton.addEventListener("click", () => {
//     displayNotification();
//   });
// }

// function initializeFCM() {
//   messaging
//     .requestPermission()
//     .then(() => {
//       console.log("Notification permission granted.");

//       // get the token in the form of promise
//       return messaging.getToken();
//     })
//     .then(token => {
//       document.cookie = 'notification_token = ' + token;

//       // TokenElem.innerHTML = "token is : " + token;

//     })
//     .catch(err => {
//       // ErrElem.innerHTML = ErrElem.innerHTML + "; " + err;
//       console.log("Unable to get permission to notify.", err);
//     });
// }

// function displayNotification() {
//   if (window.Notification && Notification.permission === "granted") {
//     notification();
//   }
//   // If the user hasn't told if he wants to be notified or not
//   // Note: because of Chrome, we are not sure the permission property
//   // is set, therefore it's unsafe to check for the "default" value.
//   else if (window.Notification && Notification.permission !== "denied") {
//     Notification.requestPermission(status => {
//       if (status === "granted") {
//         notification();
//       } else {
//         alert("You denied or dismissed permissions to notifications.");
//       }
//     });
//   } else {
//     // If the user refuses to get notified
//     alert(
//       "You denied permissions to notifications. Please go to your browser or phone setting to allow notifications."
//     );
//   }
// }

// function notification() {
//   const options = {
//     body: "Testing Our Notification",
//     icon: "./doncen-icon.png"
//   };
//   swRegistration.showNotification("PWA Notification!", options);
// }


// // // Add to homescreen button
// // const addToHomescreenButton = document.getElementById('addToHomescreen');

// // addToHomescreenButton.addEventListener('click', () => {
// //   // Check if the browser supports the beforeinstallprompt event
// //   alert('Yes');
// //   if ('beforeinstallprompt' in window) {
// //     // Show the add to homescreen prompt
// //     window.addEventListener('beforeinstallprompt', (event) => {
// //       event.preventDefault();
// //       // Stash the event so it can be triggered later
// //       window.deferredPrompt = event;
// //       // Show the add to homescreen button
// //       addToHomescreenButton.style.display = 'block';
// //     });
// //   }
// // });

// // // Handle the add to homescreen prompt
// // window.addEventListener('beforeinstallprompt', (event) => {
// //   // Prevent the default prompt
// //   event.preventDefault();
// //   // Show the add to homescreen button
// //   addToHomescreenButton.style.display = 'block';
// // });

// // // Handle the install event
// // window.addEventListener('appinstalled', () => {
// //   // Hide the add to homescreen button
// //   addToHomescreenButton.style.display = 'none';
// // });



// // let deferredPrompt;
// // const addBtn = document.querySelector('.add-button');
// // addBtn.style.display = 'none';




// // window.addEventListener('beforeinstallprompt', (e) => {
// //   // Prevent Chrome 67 and earlier from automatically showing the prompt
// //   e.preventDefault();
// //   // Stash the event so it can be triggered later.
// //   deferredPrompt = e;
// //   // Update UI to notify the user they can add to home screen

// //       var position = $(window).scrollTop(); 
      
// //       $(window).scroll(function() {
          
// //           var scroll = $(window).scrollTop();
          
// //           if(scroll > position) {
// //               addBtn.style.display = 'block';
// //           } else {
// //               addBtn.style.display = 'none';
// //           }

// //           position = scroll;
// //       });
  

// //   addBtn.addEventListener('click', () => {
// //     // hide our user interface that shows our A2HS button

// //     addBtn.style.display = 'none';
// //     // Show the prompt
// //     deferredPrompt.prompt();
// //     // Wait for the user to respond to the prompt
// //     deferredPrompt.userChoice.then((choiceResult) => {
// //       if (choiceResult.outcome === 'accepted') {
// //         console.log('User accepted the A2HS prompt');
// //       } else {
// //         console.log('User dismissed the A2HS prompt');
// //       }
// //       deferredPrompt = null;
// //     });
// //   });
// // });



// let deferredPrompt;
// const addBtn = document.querySelector('.add-button');
// addBtn.style.display = 'none';

// window.addEventListener('beforeinstallprompt', (e) => {
//   // alert('1');
//   e.preventDefault();
//   deferredPrompt = e;
//   addBtn.style.display = 'block';
// });

// addBtn.addEventListener('click', () => {
//   // alert('2');
//   addBtn.style.display = 'none';
//   if (deferredPrompt) {
//     deferredPrompt.prompt();
//     deferredPrompt.userChoice.then((choiceResult) => {
//       if (choiceResult.outcome === 'accepted') {
//         console.log('User accepted the A2HS prompt');
//       } else {
//         console.log('User dismissed the A2HS prompt');
//       }
//       deferredPrompt = null;
//     });
//   } else {
//     alert('Please add this app to your home screen manually.');
//   }
// });

// // Simplified scroll event handling
// window.addEventListener('scroll', () => {
//   if (window.scrollY > 0) {
//     addBtn.style.display = 'block';
//   } else {
//     addBtn.style.display = 'none';
//   }
// });





/// New Code

  



  





// Firebase Push Notification start

    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
    import { getMessaging, getToken } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-messaging.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyAQsVSjofHfiWHWqai-0shuFexPke1-NEQ",
        authDomain: "doncen-1.firebaseapp.com",
        projectId: "doncen-1",
        storageBucket: "doncen-1.appspot.com",
        messagingSenderId: "741021253190",
        appId: "1:741021253190:web:569722f8de9679f5ffd447"

    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const messaging = getMessaging(app);

    const swUrl = new URL('sw.js', location.origin).href;
    let registration;
    navigator.serviceWorker.register(swUrl).then(registration => {

        registration = registration;
        getToken(messaging, {
            serviceWorkerRegistration: registration,
            vapidKey: 'BLic6t4EY9gjuRy-zNvjz9cTqFlNE2OjS9cHKlLLmOYExtjdxWNi3XXS2rGVLPX-EjnOEPNvjft_mh8MAl-TSEs' }).then((currentToken) => {
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


// Install App to Home Screen 
  // let addBtn = document.querySelector('.add-button');
  // addBtn.style.display = 'none';

  // let deferredPrompt;

  // window.addEventListener('beforeinstallprompt', (e) => {
  //     e.preventDefault();
  //     deferredPrompt = e;
  //     addBtn.style.display = 'block';
  // });

  // addBtn.addEventListener('click', () => {
  //     addBtn.style.display = 'none';
  //     if (deferredPrompt) {
  //         deferredPrompt.prompt();
  //         deferredPrompt.userChoice.then((choiceResult) => {
  //             if (choiceResult.outcome === 'accepted') {
  //                 console.log('User accepted the A2HS prompt');
  //             } else {
  //                 console.log('User dismissed the A2HS prompt');
  //             }
  //             deferredPrompt = null;
  //         });
  //     } else {
  //         alert('Please add this app to your home screen manually.');
  //     }
  // });

  // window.addEventListener('scroll', () => {
  //     if (window.scrollY > 0) {
  //         addBtn.style.display = 'block';
  //     } else {
  //         addBtn.style.display = 'none';
  //     }
  // });


   

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

    // function displayNotification() {
    //   if (window.Notification && Notification.permission === "granted") {
    //     notification();
    //   } else if (window.Notification && Notification.permission !== "denied") {
    //     try {
    //       Notification.requestPermission(status => {
    //         if (status === "granted") {
    //           notification();
    //         } else {
    //           alert("You denied or dismissed permissions to notifications.");
    //         }
    //       });
    //     } catch (error) {
    //       console.log("Error requesting permission:", error);
    //     }
    //   } else {
    //     alert(
    //       "You denied permissions to notifications. Please go to your browser or phone setting to allow notifications."
    //     );
    //   }
    // }

    // function notification() {
    //   if (!registration) {
    //     console.log("Service worker registration is not available.");
    //     return;
    //   }
    //   const options = {
    //     body: "Testing Our Notification",
    //     icon: "./doncen-icon.png"
    //   };
    //   registration.showNotification("PWA Notification!", options);
    // }

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

