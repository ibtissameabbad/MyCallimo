export default	class Gate {

	
	constructor(user) {
		this.user = user;
	}

	isAdmin(){
		return this.user.role.name === "admin";
	}
	
	isSperviseur(){
		return this.user.role.name === "superviseur";
	}
	
	isColler(){
		return this.user.role.name === "coller";
	}

	
    

}