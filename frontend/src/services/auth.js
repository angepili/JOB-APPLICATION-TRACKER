const BASE_URL = import.meta.env.VITE_BASE_URL;

export async function login({email, password}) {
    const resp = await fetch(`${BASE_URL}/api/login`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({email,password})
    });

    const data = await resp.json();

    if( !resp.ok ) {
        throw new Error( data.message || 'Errore login' );
    }

    return data;
}