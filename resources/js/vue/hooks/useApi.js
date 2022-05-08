import {ref} from "vue";

export default function useApi(
    factory,
){
    const isLoading = ref(false);
    const result = ref(null);
    const error = ref(null);
    const execute = async (...args) => {
        const request = factory(...args);

        isLoading.value = true;
        error.value = null;
        try {
            const response = await axios(request);
            const valueResponse = response.data

            result.value = valueResponse;
            return valueResponse;
        } catch (e) {
            console.log('error', e)
            error.value = e;
            result.value = null;
        } finally {
            isLoading.value = false;
        }
    };

    return {
        isLoading,
        result,
        error,
        execute,
    };
}
