self.addEventListener("install", event => {
    console.log("Service Worker installato");
  });
  
  self.addEventListener("fetch", event => {
    console.log("Richiesta effettuata:", event.request.url);
  });
  