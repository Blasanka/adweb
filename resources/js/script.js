var user = firebase.auth().currentUser;

if (user) {
    firebase.auth().signOut().then(function() {
        console.log('Signed Out');
    }, function(error) {
        console.error('Sign Out Error', error);
    });
} else {
    consolee.error('not sign in');
}