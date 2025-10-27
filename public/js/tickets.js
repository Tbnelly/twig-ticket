// public/js/tickets.js

// Simple UUID generator (replacement for uuidv4)
function uuidv4() {
  return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
    const r = (Math.random() * 16) | 0,
      v = c === 'x' ? r : (r & 0x3) | 0x8;
    return v.toString(16);
  });
}

// Helper: get current logged-in user
export const getCurrentUser = () => JSON.parse(localStorage.getItem("current_user"));

// Get tickets for current user only
export const getTickets = () => {
  const currentUser = getCurrentUser();
  if (!currentUser) return [];

  const tickets = JSON.parse(localStorage.getItem("tickets")) || [];
  return tickets.filter((t) => t.owner === currentUser.email);
};

// Save tickets array back to localStorage
export const saveTickets = (tickets) => {
  localStorage.setItem("tickets", JSON.stringify(tickets));
};

// Create a new ticket for current user
export const createTicket = (data) => {
  const currentUser = getCurrentUser();
  if (!currentUser) return;

  const tickets = JSON.parse(localStorage.getItem("tickets")) || [];
  const newTicket = { id: uuidv4(), ...data, owner: currentUser.email };

  tickets.push(newTicket);
  saveTickets(tickets);
  return newTicket;
};

// Update a ticket (only if owned by current user)
export const updateTicket = (id, updatedData) => {
  const currentUser = getCurrentUser();
  if (!currentUser) return;

  let tickets = JSON.parse(localStorage.getItem("tickets")) || [];
  tickets = tickets.map((t) =>
    t.id === id && t.owner === currentUser.email ? { ...t, ...updatedData } : t
  );
  saveTickets(tickets);
};

// Delete a ticket (only if owned by current user)
export const deleteTicket = (id) => {
  const currentUser = getCurrentUser();
  if (!currentUser) return;

  let tickets = JSON.parse(localStorage.getItem("tickets")) || [];
  tickets = tickets.filter((t) => !(t.id === id && t.owner === currentUser.email));
  saveTickets(tickets);
};
