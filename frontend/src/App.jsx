import "./App.css";
import LoginPage from "./pages/Login";
import { useAuth } from './context/AuthContext';


function App() {
 const { user } = useAuth();
  console.log( user );
  return (
    <>
      {user ? (
        <h2>Benvenuto {user.name} </h2>
      ) : (
        <LoginPage />
      )}
    </>
  );
}

export default App;
