export default class Gate
{
    /**
     * Initialize a new gate instance.
     *
     * @param  {string|object}  user
     * @return {void}
     */
    constructor(user = 'user')
    {
        this.user = typeof user === 'object' ? user : (window[user] || null);
    }

    /**
     * Check if the user has a general perssion.
     *
     * @return {bool|void}
     */
    before()
    {
        return this.user.roles.indexOf("Admin") !== -1;
    }

    /**
     * Determine wheter the user can perform the action on the model.
     *
     * @param  {string}  action
     * @return {bool}
     */
    allow(action)
    {
        if (this.before()) {
            return true;
        }

        if (this.user && this.user.permissions) {
            return this.user.permissions.indexOf(action) !== -1;
        }

        return false;
    }

    /**
     * Determine wheter the user can't perform the action on the model.
     *
     * @param  {string}  action
     * @return {bool}
     */
    deny(action)
    {
        return ! this.allow(action);
    }
}
