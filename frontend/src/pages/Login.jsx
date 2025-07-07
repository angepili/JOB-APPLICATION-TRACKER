import { useState } from "react";
import { login } from "./../services/auth";
import { useAuth } from "./../context/AuthContext";

import Button from "@mui/material/Button";
import TextField from "@mui/material/TextField";
import Grid from "@mui/material/Grid";
import Stack from "@mui/material/Stack";
import Dialog from "@mui/material/Dialog";
import DialogActions from "@mui/material/DialogActions";
import DialogContent from "@mui/material/DialogContent";
import DialogContentText from "@mui/material/DialogContentText";
import DialogTitle from "@mui/material/DialogTitle";

export default function LoginPage() {
  const { setUser } = useAuth();

  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [errorModalOpen, setErrorModalOpen] = useState(false);
  const [errorMessage, setErrorMessage] = useState("");

  const handleLogin = async (e) => {
    e.preventDefault();
    try {
      const data = await login({ email, password });
      localStorage.setItem("token", data.token);
      setUser(data.user);
    } catch (err) {
      setErrorMessage(err.message || "Errore durante il login");
      setErrorModalOpen(true);
    }
  };

  const handleCloseErrorModal = () => {
    setErrorModalOpen(false);
  };

  return (
    <>
      <form onSubmit={handleLogin}>
        <Grid container spacing={2}>
          <Grid
            size={4}
            style={{
              backgroundColor: "#fff",
              color: "#000",
              width: "400px",
              padding: "2.5rem",
              borderRadius: "5px",
            }}
          >
            <Stack spacing={2}>
              <h2>Login</h2>
              <TextField
                value={email}
                onChange={(e) => setEmail(e.target.value)}
                required
                label="User"
                variant="outlined"
                style={{ backgroundColor: "white" }}
              />
              <TextField
                type="password"
                value={password}
                onChange={(e) => setPassword(e.target.value)}
                required
                label="Password"
                variant="outlined"
                style={{ backgroundColor: "white" }}
              />
              <Button variant="contained" type="submit" size="large">
                Login
              </Button>
            </Stack>
          </Grid>
        </Grid>
      </form>


      <Dialog
        open={errorModalOpen}
        onClose={handleCloseErrorModal}
        aria-labelledby="alert-dialog-title"
        aria-describedby="alert-dialog-description"
      >
        <DialogTitle id="alert-dialog-title">
          {"Errore di autenticazione"}
        </DialogTitle>
        <DialogContent>
          <DialogContentText id="alert-dialog-description">
            {errorMessage}
          </DialogContentText>
        </DialogContent>
        <DialogActions>
          <Button onClick={handleCloseErrorModal} color="primary" autoFocus>
            Chiudi
          </Button>
        </DialogActions>
      </Dialog>
    </>
  );
}
