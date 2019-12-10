/**
 * Error Helper
 */
export class HError {

    /**
     *
     * @param {Object} error
     */
    constructor(error = null) {
        this.error = error;
    }

    /**
     * Get error message from failed post request
     * @param {Object} error
     * @param {String} name - name of the error message key in response
     * @return {boolean|string}
     */
    getError(name){
        if(this.error){
            console.log(this.error);
            return this.error.errors[name] ? this.error.errors[name][0] : null;
        }else{
            console.log('error object is not set');
        }
    }

    /**
     *
     * @param {Object} error
     */
    setErrorObj(error) {
        this.error = error;
    }

}