import React, { useEffect, useState } from 'react';
import Button from 'react-bootstrap/Button';
import Card from 'react-bootstrap/Card';
import { getItem } from '../api.jsx'; // Asegúrate de ajustar la ruta según sea necesario

const Pj = ({ pjs = [], onDelete, onEdit }) => {
    const [items, setItems] = useState({});

    useEffect(() => {
        const fetchItems = async () => {
            const itemsData = {};
            for (const item of pjs) {
                const arma = await getItem(item.id_arma);
                const armadura = await getItem(item.id_armadura);
                itemsData[item.id_pj] = { arma, armadura };
            }
            setItems(itemsData);
        };

        fetchItems();
    }, [pjs]);
    console.log(items);

    return (
        <div className="d-flex flex-wrap justify-content-center">
            {pjs.length > 0 ? (
                pjs.map((item, index) => (
                    <Card key={index} style={{ width: '18rem', margin: '10px' }}>
                        <Card.Img variant="top" src={item.img} />
                        <Card.Body>
                            <Card.Title>{item.name}</Card.Title>
                            <Card.Text key={item.id_pj}>

                                <span>Arma: {items[item.id_pj]?.arma?.name || 'Cargando...'}</span><br />
                                <span>Armadura: {items[item.id_pj]?.armadura?.name || 'Cargando...'}</span><br />
                                <span>Age: {item.age}</span><br />
                                <span>ID: {item.id_pj}</span>
                                
                            </Card.Text>
                            <Button variant="primary" style={{ marginRight: '10px' }} onClick={() => onEdit(item)}>Editar</Button>
                            <Button variant="danger" onClick={() => onDelete(item.id_pj)}>Eliminar</Button>
                        </Card.Body>
                    </Card>
                ))
            ) : (
                <p>No hay objetos</p>
            )}
        </div>
    );
};

export default Pj;