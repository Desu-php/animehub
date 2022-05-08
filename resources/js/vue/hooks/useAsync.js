import {ref} from "vue";
import {useToast} from "vue-toastification";


export const useAsync = (fn, initialLoading = false) => {

    const loading = ref(false)
    const error = ref(null)
    const value = ref(null)
    const validation = ref({})
    const toast = useToast()

    const run = async (args = null) => {
        try {
            loading.value = true;
            error.value = null;
            validation.value = {}
            const response = await fn(args);
            value.value = response.data
        } catch (e) {
            error.value = e;

            if (e.response.status !== 422){
                const data = e.response.data
                toast.error(data.message)
            }else if(e.response.status === 422){
                validation.value = e.response.data.errors
            }

            value.value = null;
        } finally {
            loading.value = false
        }
    };

    return {
        loading,
        error,
        value,
        run,
        validation
    };
};
