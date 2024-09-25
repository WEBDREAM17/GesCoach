import users from "$lib/mocks/users.json";

export function authenticateUser(username, password) {
  const user = users.find(u => u.username === username && u.password === password);
  if (user) {
    const { id, role } = user;
    const token = generateToken(id, role);
    return { token, role };
  }
  return null;
}

function generateToken(userId, userRole) {
  // Generate a JWT token here or use any authentication mechanism
  //Lorsque l'application est en ligne, appeler ici le Webservice d'authentification
}