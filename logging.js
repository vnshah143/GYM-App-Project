// logging.js

function logAction(action) {
    const timestamp = new Date().toISOString();
    console.log(`[${timestamp}] Action: ${action}`);
}

// Example usage
logAction('Member added');
