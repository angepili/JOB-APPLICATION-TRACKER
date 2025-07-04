// import { useState }  'react'
import { useState } from "react";
import "./App.css";
import LoginPage from "./pages/Login";

function App() {
  const [user, setUser] = useState(null);

  return (
    <>
      {user ? (
        <h2>Benvenuto {user.name} </h2>
      ) : (
        <LoginPage onLogin={setUser}></LoginPage>
      )}
    </>
  );
}

export default App;
