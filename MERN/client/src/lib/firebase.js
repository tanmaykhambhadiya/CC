import { initializeApp } from 'firebase/app';
import { getDatabase } from 'firebase/database';

const firebaseConfig = {
  apiKey: "AIzaSyCshCQlOoD3pgvhr0wJ7DV5o2Nu-1UqqKU",
  authDomain: "geolocation-cc.firebaseapp.com",
  databaseURL: "https://geolocation-cc-default-rtdb.firebaseio.com",
  projectId: "geolocation-cc",
  storageBucket: "geolocation-cc.firebasestorage.app",
  messagingSenderId: "159296998445",
  appId: "1:159296998445:web:f8afb613193604bfb5bca4",
  measurementId: "G-4Q79SRJS9N"
};

const app = initializeApp(firebaseConfig);
export const db = getDatabase(app);
