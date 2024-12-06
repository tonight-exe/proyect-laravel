import axios from 'axios';

const elden = 'https://6705f368031fd46a831174ec.mockapi.io/api/elden';
const eldenlaravel = 'http://localhost:8000/api/personaje';
const eldenlaravel2 = 'http://localhost:8000/api/Item';

export const getItem = async (id) => {
  try {// es para intentar hacer algo y si no se puede... hace lo
      // esta en el catch
    const response = await axios.get(`${eldenlaravel2}/${id}`);
      return response.data//devuelve la api y solo muestra la informacion que te pido

  } catch (error) {
      console.error('Error fetching data: ', error);
      return error
  }
};
export const getPJ = async () => {
  try {// es para intentar hacer algo y si no se puede... hace lo
      // esta en el catch
    const response = await axios.get(eldenlaravel);
      return response.data//devuelve la api y solo muestra la informacion que te pido

  } catch (error) {
      console.error('Error fetching data: ', error);
      return error

  }
};
export const createPJ = async (newPJ) => {
  try {
      const response = await axios.post(eldenlaravel, newPJ);
      return response.data;
  } catch (error) {
      console.error('Error creating new character: ', error);
      return error;
  }
};
export const deletePJ = async (id_pj) => {
  try {
      await axios.delete(`${eldenlaravel}/${id_pj}`);
  } catch (error) {
      console.error('Error deleting character:', error);
  }
};
export const updatePJ = async (id_pj, updatedPJ) => {
try {
    const response = await axios.put(`${eldenlaravel}/${id_pj}`, updatedPJ);
    return response.data;
} catch (error) {
    console.error('Error updating character:', error);
    return error;
}
};
