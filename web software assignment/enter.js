const firebaseConfig = {
    apiKey: "AIzaSyBcGlzaSlWLFaQfdcdMcrkseSngoS8yXsA",
    authDomain: "webproj-7dd27.firebaseapp.com",
    projectId: "webproj-7dd27",
    storageBucket: "webproj-7dd27.appspot.com",
    messagingSenderId: "185760514400",
    appId: "1:185760514400:web:a8910bc876757cfda69e05",
    measurementId: "G-69B0N8QHVD"
  };
  firebase.initializeApp(config);

exports.signup = (username,email,number,password) => {
  const userRef = firebase.database().ref('users').push();
  userRef.set({
    email,
    password,
    username,
    number
  });

  return userRef.key;
};

exports.signin = (email, password) => {
  const userRef = firebase.database().ref('users').child(email);
  return userRef.get().then(user => {
    if (user.exists && user.val().password === password) {
      return user.key;
    } else {
      return null;
    }
  });
};