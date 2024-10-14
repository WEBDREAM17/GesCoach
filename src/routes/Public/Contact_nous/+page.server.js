import { error, fail } from "@sveltejs/kit";

export const actions = {
    default: async ({request})=> {
      const formData = await request.formData();
      const name = formData.get("name");
      const email = formData.get("email");
      const message = formData.get("message");

      // do something with the data

      if (!name) {
        return fail(400, { error: "name is missing", email, message});
      }
      if (!email) {
        return fail(400, { error: "name is missing", email, message});
      }
      if (!message) {
        return fail(400, { error: "message is missing", email, message});
      }

return {

    message: "Message envoyé",
};
    },
};