
// self.addEventListener('install', (e) => {
//   e.waitUntil(
//     caches.open('fox-store').then((cache) => cache.addAll([
      
//     ])),
//   );
// });

// self.addEventListener('fetch', (e) => {
//   console.log(e.request.url);
//   e.respondWith(
//     caches.match(e.request).then((response) => response || fetch(e.request)),
//   );
// });


/////////////////////////////////////////

// Add all the files required with Installed App - PWA

// // Get all images:
// const images = Array.from(document.images);
// const imageUrls = images.map(img => img.src);

// console.log(...imageUrls);

// // Get all scripts:
// const scripts = Array.from(document.scripts);
// const scriptUrls = scripts.map(script => script.src);
// console.log(...scriptUrls);

// // Get all stylesheets:
// const stylesheets = Array.from(document.styleSheets);
// const stylesheetUrls = stylesheets.map(sheet => sheet.href);
// console.log(stylesheetUrls);

// console.log([
//         ...imageUrls,
//         ...scriptUrls,
//         ...stylesheetUrls
//       ]);

// // Get all links (including CSS and JavaScript files):
// // const links = Array.from(document.links);
// // const linkUrls = links.map(link => link.href);
// // console.log(linkUrls);

// self.addEventListener('install', (e) => {
//   e.waitUntil(
//     caches.open('fox-store').then((cache) => {
//       // Add resources to cache here, e.g., images, CSS, JavaScript files
//       return cache.addAll([
//         ...imageUrls,
//         ...scriptUrls,
//         ...stylesheetUrls
//       ]);
//     }),
//   );
// });


self.addEventListener('install', (e) => {
  e.waitUntil(
    caches.open('fox-store').then((cache) => {
      // Add resources to cache here, e.g., images, CSS, JavaScript files
      return cache.addAll([
        'https://doncen.org/css/user/css/bootstrap.min.css',
        // Add other resources here, e.g., images, JavaScript files
        // Make sure to include the start_url from your manifest.json
        'https://doncen.org/donation-near-me/lat-22.7007685/lon-75.8415264/dist_frm-0/dist_to-5/dist_unt-KM/dd-1'
      ]);
    }),
  );
});

// handle the activate event to remove any outdated caches:
self.addEventListener('activate', (e) => {
  e.waitUntil(
    caches.keys().then((keyList) => {
      return Promise.all(keyList.map((key) => {
        if (key !== 'fox-store') {
          return caches.delete(key);
        }
      }));
    }),
  );
});


// self.addEventListener('fetch', (e) => {
//   console.log(e.request.url);
//   e.respondWith(
//     caches.match(e.request).then((response) => response || fetch(e.request)),
//   );
// });

//////////////////////////////////////////

// service-worker.js

// // Cache version
// const CACHE_VERSION = 'v1';

// // Files to cache
// const FILES_TO_CACHE = [
//   '/',
//   'index.php',
//   'uploads/icon/doncen-icon-48x48.png',
//   'uploads/icon/doncen-icon-72x72.png',
//   'uploads/icon/doncen-icon-96x96.png',
//   'uploads/icon/doncen-icon-144x144.png',
//   'uploads/icon/doncen-icon-168x168.png',
//   'uploads/icon/doncen-icon-192x192.png',
//   // Add more files as needed
// ];

// // Install service worker
// self.addEventListener('install', (event) => {
//   event.waitUntil(
//     caches.open(CACHE_VERSION)
//      .then((cache) => {
//         console.log('Opened cache');
//         return cache.addAll(FILES_TO_CACHE);
//       })
//   );
// });

// // Activate service worker
// self.addEventListener('activate', (event) => {
//   event.waitUntil(
//     caches.keys().then((keyList) => {
//       return Promise.all(keyList.map((key) => {
//         if (key!== CACHE_VERSION) {
//           console.log('Deleting cache', key);
//           return caches.delete(key);
//         }
//       }));
//     })
//   );
// });

// // Fetch event
// self.addEventListener('fetch', (event) => {
//   event.respondWith(
//     caches.open(CACHE_VERSION)
//      .then((cache) => {
//         return cache.match(event.request)
//          .then((response) => {
//             return response || fetch(event.request);
//           });
//       })
//   );
// });


// Firebase Messaging Service Worker

self.addEventListener("push", (event) => {

    const notif = event.data.json().notification;

    event.waitUntil(self.registration.showNotification(notif.title , {
        body: notif.body,
        icon: notif.image,
        data: {
            url: notif.click_action
        }
    }));

});

self.addEventListener("notificationclick", (event) => {

    event.waitUntil(clients.openWindow(event.notification.data.url));

});