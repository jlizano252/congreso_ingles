<?php


// Provinces...
use App\Models\Canton;
use App\Models\District;
use App\Models\Province;

Province::create(['name' => 'San José', 'code' => 10000]);
Province::create(['name' => 'Alajuela', 'code' => 20000]);
Province::create(['name' => 'Cartago', 'code' => 30000]);
Province::create(['name' => 'Heredia', 'code' => 40000]);
Province::create(['name' => 'Guanacaste', 'code' => 50000]);
Province::create(['name' => 'Puntarenas', 'code' => 60000]);
Province::create(['name' => 'Limón', 'code' => 70000]);

// Cantons...
// SAN JOSÉ
Canton::create(['province_id' => 1, 'name' => 'Cantón Central', 'code' => 100, 'number' => 1]);
Canton::create(['province_id' => 1, 'name' => 'Escazú', 'code' => 200, 'number' => 2]);
Canton::create(['province_id' => 1, 'name' => 'Desamparados', 'code' => 300, 'number' => 3]);
Canton::create(['province_id' => 1, 'name' => 'Puriscal', 'code' => 400, 'number' => 4]);
Canton::create(['province_id' => 1, 'name' => 'Tarrazú', 'code' => 500, 'number' => 5]);
Canton::create(['province_id' => 1, 'name' => 'Aserrí', 'code' => 600, 'number' => 6]);
Canton::create(['province_id' => 1, 'name' => 'Mora', 'code' => 700, 'number' => 7]);
Canton::create(['province_id' => 1, 'name' => 'Goicoechea', 'code' => 800, 'number' => 8]);
Canton::create(['province_id' => 1, 'name' => 'Santa Ana', 'code' => 900, 'number' => 9]);
Canton::create(['province_id' => 1, 'name' => 'Alajuelita', 'code' => 1000, 'number' => 10]);
Canton::create(['province_id' => 1, 'name' => 'Vázquez De Coronado', 'code' => 1100, 'number' => 11]);
Canton::create(['province_id' => 1, 'name' => 'Acosta', 'code' => 1200, 'number' => 12]);
Canton::create(['province_id' => 1, 'name' => 'Tibás', 'code' => 1300, 'number' => 13]);
Canton::create(['province_id' => 1, 'name' => 'Moravia', 'code' => 1400, 'number' => 14]);
Canton::create(['province_id' => 1, 'name' => 'Montes De Oca', 'code' => 1500, 'number' => 15]);
Canton::create(['province_id' => 1, 'name' => 'Turrubares', 'code' => 1600, 'number' => 16]);
Canton::create(['province_id' => 1, 'name' => 'Dota', 'code' => 1700, 'number' => 17]);
Canton::create(['province_id' => 1, 'name' => 'Curridabat', 'code' => 1800, 'number' => 18]);
Canton::create(['province_id' => 1, 'name' => 'Pérez Zeledón', 'code' => 1900, 'number' => 19]);
Canton::create(['province_id' => 1, 'name' => 'León Cortés Castro', 'code' => 2000, 'number' => 20]);
// ALAJUELA
Canton::create(['province_id' => 2, 'name' => 'Cantón Central', 'code' => 100, 'number' => 1]);
Canton::create(['province_id' => 2, 'name' => 'San Ramón', 'code' => 200, 'number' => 2]);
Canton::create(['province_id' => 2, 'name' => 'Grecia', 'code' => 300, 'number' => 3]);
Canton::create(['province_id' => 2, 'name' => 'San Mateo', 'code' => 400, 'number' => 4]);
Canton::create(['province_id' => 2, 'name' => 'Atenas', 'code' => 500, 'number' => 5]);
Canton::create(['province_id' => 2, 'name' => 'Naranjo', 'code' => 600, 'number' => 6]);
Canton::create(['province_id' => 2, 'name' => 'Palmares', 'code' => 700, 'number' => 7]);
Canton::create(['province_id' => 2, 'name' => 'Poás', 'code' => 800, 'number' => 8]);
Canton::create(['province_id' => 2, 'name' => 'Orotina', 'code' => 900, 'number' => 9]);
Canton::create(['province_id' => 2, 'name' => 'San Carlos', 'code' => 1000, 'number' => 10]);
Canton::create(['province_id' => 2, 'name' => 'Zarcero', 'code' => 1100, 'number' => 11]);
Canton::create(['province_id' => 2, 'name' => 'Sarchí', 'code' => 1200, 'number' => 12]);
Canton::create(['province_id' => 2, 'name' => 'Upala', 'code' => 1300, 'number' => 13]);
Canton::create(['province_id' => 2, 'name' => 'Los Chiles', 'code' => 1400, 'number' => 14]);
Canton::create(['province_id' => 2, 'name' => 'Guatuso', 'code' => 1500, 'number' => 15]);
Canton::create(['province_id' => 2, 'name' => 'Río Cuarto', 'code' => 1600, 'number' => 16]);
// CARTAGO
Canton::create(['province_id' => 3, 'name' => 'Cantón Central', 'code' => 100, 'number' => 1]);
Canton::create(['province_id' => 3, 'name' => 'Paraíso', 'code' => 200, 'number' => 2]);
Canton::create(['province_id' => 3, 'name' => 'La Unión', 'code' => 300, 'number' => 3]);
Canton::create(['province_id' => 3, 'name' => 'Jiménez', 'code' => 400, 'number' => 4]);
Canton::create(['province_id' => 3, 'name' => 'Turrialba', 'code' => 500, 'number' => 5]);
Canton::create(['province_id' => 3, 'name' => 'Alvarado', 'code' => 600, 'number' => 6]);
Canton::create(['province_id' => 3, 'name' => 'Oreamuno', 'code' => 700, 'number' => 7]);
Canton::create(['province_id' => 3, 'name' => 'El Guarco', 'code' => 800, 'number' => 8]);
// HEREDIA
Canton::create(['province_id' => 4, 'name' => 'Cantón Central', 'code' => 100, 'number' => 1]);
Canton::create(['province_id' => 4, 'name' => 'Barva', 'code' => 200, 'number' => 2]);
Canton::create(['province_id' => 4, 'name' => 'Santo Domingo', 'code' => 300, 'number' => 3]);
Canton::create(['province_id' => 4, 'name' => 'Santa Barbara', 'code' => 400, 'number' => 4]);
Canton::create(['province_id' => 4, 'name' => 'San Rafael', 'code' => 500, 'number' => 5]);
Canton::create(['province_id' => 4, 'name' => 'San Isidro', 'code' => 600, 'number' => 6]);
Canton::create(['province_id' => 4, 'name' => 'Belén', 'code' => 700, 'number' => 7]);
Canton::create(['province_id' => 4, 'name' => 'Flores', 'code' => 800, 'number' => 8]);
Canton::create(['province_id' => 4, 'name' => 'San Pablo', 'code' => 900, 'number' => 9]);
Canton::create(['province_id' => 4, 'name' => 'Sarapiquí', 'code' => 1000, 'number' => 10]);
// GUANACASTE
Canton::create(['province_id' => 5, 'name' => 'Liberia', 'code' => 100, 'number' => 1]);
Canton::create(['province_id' => 5, 'name' => 'Nicoya', 'code' => 200, 'number' => 2]);
Canton::create(['province_id' => 5, 'name' => 'Santa Cruz', 'code' => 300, 'number' => 3]);
Canton::create(['province_id' => 5, 'name' => 'Bagaces', 'code' => 400, 'number' => 4]);
Canton::create(['province_id' => 5, 'name' => 'Carrillo', 'code' => 500, 'number' => 5]);
Canton::create(['province_id' => 5, 'name' => 'Cañas', 'code' => 600, 'number' => 6]);
Canton::create(['province_id' => 5, 'name' => 'Abangares', 'code' => 700, 'number' => 7]);
Canton::create(['province_id' => 5, 'name' => 'Tilarán', 'code' => 800, 'number' => 8]);
Canton::create(['province_id' => 5, 'name' => 'Nandayure', 'code' => 900, 'number' => 9]);
Canton::create(['province_id' => 5, 'name' => 'La Cruz', 'code' => 1000, 'number' => 10]);
Canton::create(['province_id' => 5, 'name' => 'Hojancha', 'code' => 1100, 'number' => 11]);
// PUNTARENAS
Canton::create(['province_id' => 6, 'name' => 'Cantón Central', 'code' => 100, 'number' => 1]);
Canton::create(['province_id' => 6, 'name' => 'Esparza', 'code' => 200, 'number' => 2]);
Canton::create(['province_id' => 6, 'name' => 'Buenos Aires', 'code' => 300, 'number' => 3]);
Canton::create(['province_id' => 6, 'name' => 'Montes De Oro', 'code' => 400, 'number' => 4]);
Canton::create(['province_id' => 6, 'name' => 'Osa', 'code' => 500, 'number' => 5]);
Canton::create(['province_id' => 6, 'name' => 'Quepos', 'code' => 600, 'number' => 6]);
Canton::create(['province_id' => 6, 'name' => 'Golfito', 'code' => 700, 'number' => 7]);
Canton::create(['province_id' => 6, 'name' => 'Coto Brus', 'code' => 800, 'number' => 8]);
Canton::create(['province_id' => 6, 'name' => 'Parrita', 'code' => 900, 'number' => 9]);
Canton::create(['province_id' => 6, 'name' => 'Corredores', 'code' => 1000, 'number' => 10]);
Canton::create(['province_id' => 6, 'name' => 'Garabito', 'code' => 1100, 'number' => 11]);
// LIMÓN
Canton::create(['province_id' => 7, 'name' => 'Cantón Central', 'code' => 100, 'number' => 1]);
Canton::create(['province_id' => 7, 'name' => 'Pococí', 'code' => 200, 'number' => 2]);
Canton::create(['province_id' => 7, 'name' => 'Siquirres', 'code' => 300, 'number' => 3]);
Canton::create(['province_id' => 7, 'name' => 'Talamanca', 'code' => 400, 'number' => 4]);
Canton::create(['province_id' => 7, 'name' => 'Matina', 'code' => 500, 'number' => 5]);
Canton::create(['province_id' => 7, 'name' => 'Guácimo', 'code' => 600, 'number' => 6]);

// Districts...
// SAN JOSÉ - CENTRAL
District::create(['province_id' => 1, 'canton_id' => 1, 'name' => 'Carmen', 'code' => 1]);
District::create(['province_id' => 1, 'canton_id' => 1, 'name' => 'Merced', 'code' => 2]);
District::create(['province_id' => 1, 'canton_id' => 1, 'name' => 'Hospital', 'code' => 3]);
District::create(['province_id' => 1, 'canton_id' => 1, 'name' => 'Catedral', 'code' => 4]);
District::create(['province_id' => 1, 'canton_id' => 1, 'name' => 'Zapote', 'code' => 5]);
District::create(['province_id' => 1, 'canton_id' => 1, 'name' => 'San Francisco De Dos Rios', 'code' => 6]);
District::create(['province_id' => 1, 'canton_id' => 1, 'name' => 'Uruca', 'code' => 7]);
District::create(['province_id' => 1, 'canton_id' => 1, 'name' => 'Mata Redonda', 'code' => 8]);
District::create(['province_id' => 1, 'canton_id' => 1, 'name' => 'Pavas', 'code' => 9]);
District::create(['province_id' => 1, 'canton_id' => 1, 'name' => 'Hatillo', 'code' => 10]);
District::create(['province_id' => 1, 'canton_id' => 1, 'name' => 'San Sebastián', 'code' => 11]);
// SAN JOSÉ - ESCAZÚ
District::create(['province_id' => 1, 'canton_id' => 2, 'name' => 'Escazú', 'code' => 1]);
District::create(['province_id' => 1, 'canton_id' => 2, 'name' => 'San Antonio', 'code' => 2]);
District::create(['province_id' => 1, 'canton_id' => 2, 'name' => 'San Rafael', 'code' => 3]);
// SAN JOSÉ - DESAMPARADOS
District::create(['province_id' => 1, 'canton_id' => 3, 'name' => 'Desamparados', 'code' => 1]);
District::create(['province_id' => 1, 'canton_id' => 3, 'name' => 'San Miguel', 'code' => 2]);
District::create(['province_id' => 1, 'canton_id' => 3, 'name' => 'San Juan De Dios', 'code' => 3]);
District::create(['province_id' => 1, 'canton_id' => 3, 'name' => 'San Rafael Arriba', 'code' => 4]);
District::create(['province_id' => 1, 'canton_id' => 3, 'name' => 'San Rafael Abajo', 'code' => 5]);
District::create(['province_id' => 1, 'canton_id' => 3, 'name' => 'San Antonio', 'code' => 6]);
District::create(['province_id' => 1, 'canton_id' => 3, 'name' => 'Frailes', 'code' => 7]);
District::create(['province_id' => 1, 'canton_id' => 3, 'name' => 'Patarra', 'code' => 8]);
District::create(['province_id' => 1, 'canton_id' => 3, 'name' => 'San Cristobal', 'code' => 9]);
District::create(['province_id' => 1, 'canton_id' => 3, 'name' => 'Rosario', 'code' => 10]);
District::create(['province_id' => 1, 'canton_id' => 3, 'name' => 'Damas', 'code' => 11]);
District::create(['province_id' => 1, 'canton_id' => 3, 'name' => 'Gravilias', 'code' => 12]);
District::create(['province_id' => 1, 'canton_id' => 3, 'name' => 'Los Guido', 'code' => 13]);
// SAN JOSÉ - PURISCAL
District::create(['province_id' => 1, 'canton_id' => 4, 'name' => 'Santiago', 'code' => 1]);
District::create(['province_id' => 1, 'canton_id' => 4, 'name' => 'Mercedes Sur', 'code' => 2]);
District::create(['province_id' => 1, 'canton_id' => 4, 'name' => 'Barbacoas', 'code' => 3]);
District::create(['province_id' => 1, 'canton_id' => 4, 'name' => 'Grifo Alto', 'code' => 4]);
District::create(['province_id' => 1, 'canton_id' => 4, 'name' => 'San Rafael', 'code' => 5]);
District::create(['province_id' => 1, 'canton_id' => 4, 'name' => 'Candelarita', 'code' => 6]);
District::create(['province_id' => 1, 'canton_id' => 4, 'name' => 'Desamparaditos', 'code' => 7]);
District::create(['province_id' => 1, 'canton_id' => 4, 'name' => 'San Antonio', 'code' => 8]);
District::create(['province_id' => 1, 'canton_id' => 4, 'name' => 'Chires', 'code' => 9]);
// SAN JOSÉ - TARRAZÚ
District::create(['province_id' => 1, 'canton_id' => 5, 'name' => 'San Marcos', 'code' => 1]);
District::create(['province_id' => 1, 'canton_id' => 5, 'name' => 'San Lorenzo', 'code' => 2]);
District::create(['province_id' => 1, 'canton_id' => 5, 'name' => 'San Carlos', 'code' => 3]);
// SAN JOSÉ - ASERRÍ
District::create(['province_id' => 1, 'canton_id' => 6, 'name' => 'Aserrí', 'code' => 1]);
District::create(['province_id' => 1, 'canton_id' => 6, 'name' => 'Tarbaca', 'code' => 2]);
District::create(['province_id' => 1, 'canton_id' => 6, 'name' => 'Vuelta De Jorco', 'code' => 3]);
District::create(['province_id' => 1, 'canton_id' => 6, 'name' => 'San Gabriel', 'code' => 4]);
District::create(['province_id' => 1, 'canton_id' => 6, 'name' => 'Legua', 'code' => 5]);
District::create(['province_id' => 1, 'canton_id' => 6, 'name' => 'Monterrey', 'code' => 6]);
District::create(['province_id' => 1, 'canton_id' => 6, 'name' => 'Salitrillos', 'code' => 7]);
// SAN JOSÉ - MORA
District::create(['province_id' => 1, 'canton_id' => 7, 'name' => 'Colón', 'code' => 1]);
District::create(['province_id' => 1, 'canton_id' => 7, 'name' => 'Guayabo', 'code' => 2]);
District::create(['province_id' => 1, 'canton_id' => 7, 'name' => 'Tabarcia', 'code' => 3]);
District::create(['province_id' => 1, 'canton_id' => 7, 'name' => 'Piedras Negras', 'code' => 4]);
District::create(['province_id' => 1, 'canton_id' => 7, 'name' => 'Picagres', 'code' => 5]);
District::create(['province_id' => 1, 'canton_id' => 7, 'name' => 'Jaris', 'code' => 6]);
// SAN JOSÉ - GOICOECHEA
District::create(['province_id' => 1, 'canton_id' => 8, 'name' => 'Guadalupe', 'code' => 1]);
District::create(['province_id' => 1, 'canton_id' => 8, 'name' => 'San Francisco', 'code' => 2]);
District::create(['province_id' => 1, 'canton_id' => 8, 'name' => 'Calle Blancos', 'code' => 3]);
District::create(['province_id' => 1, 'canton_id' => 8, 'name' => 'Mata De Platano', 'code' => 4]);
District::create(['province_id' => 1, 'canton_id' => 8, 'name' => 'Ipís', 'code' => 5]);
District::create(['province_id' => 1, 'canton_id' => 8, 'name' => 'Rancho Redondo', 'code' => 6]);
District::create(['province_id' => 1, 'canton_id' => 8, 'name' => 'Purral', 'code' => 7]);
// SAN JOSÉ - SANTA ANA
District::create(['province_id' => 1, 'canton_id' => 9, 'name' => 'Santa Ana', 'code' => 1]);
District::create(['province_id' => 1, 'canton_id' => 9, 'name' => 'Salitral', 'code' => 2]);
District::create(['province_id' => 1, 'canton_id' => 9, 'name' => 'Pozos', 'code' => 3]);
District::create(['province_id' => 1, 'canton_id' => 9, 'name' => 'Uruca', 'code' => 4]);
District::create(['province_id' => 1, 'canton_id' => 9, 'name' => 'Piedades', 'code' => 5]);
District::create(['province_id' => 1, 'canton_id' => 9, 'name' => 'Brasil', 'code' => 6]);
// SAN JOSÉ - ALAJUELITA
District::create(['province_id' => 1, 'canton_id' => 10, 'name' => 'Alajuelita', 'code' => 1]);
District::create(['province_id' => 1, 'canton_id' => 10, 'name' => 'San Josecito', 'code' => 2]);
District::create(['province_id' => 1, 'canton_id' => 10, 'name' => 'San Antonio', 'code' => 3]);
District::create(['province_id' => 1, 'canton_id' => 10, 'name' => 'Concepción', 'code' => 4]);
District::create(['province_id' => 1, 'canton_id' => 10, 'name' => 'San Felipe', 'code' => 5]);
// SAN JOSÉ - VÁZQUEZ
District::create(['province_id' => 1, 'canton_id' => 11, 'name' => 'San Isidro', 'code' => 1]);
District::create(['province_id' => 1, 'canton_id' => 11, 'name' => 'San Rafael', 'code' => 2]);
District::create(['province_id' => 1, 'canton_id' => 11, 'name' => 'Dulce Nombre De Jesus', 'code' => 3]);
District::create(['province_id' => 1, 'canton_id' => 11, 'name' => 'Patalillo', 'code' => 4]);
District::create(['province_id' => 1, 'canton_id' => 11, 'name' => 'Cascajal', 'code' => 5]);
// SAN JOSÉ - ACOSTA
District::create(['province_id' => 1, 'canton_id' => 12, 'name' => 'San Ignacio', 'code' => 1]);
District::create(['province_id' => 1, 'canton_id' => 12, 'name' => 'Guaitil', 'code' => 2]);
District::create(['province_id' => 1, 'canton_id' => 12, 'name' => 'Palmichal', 'code' => 3]);
District::create(['province_id' => 1, 'canton_id' => 12, 'name' => 'Cangrejal', 'code' => 4]);
District::create(['province_id' => 1, 'canton_id' => 12, 'name' => 'Sabanillas', 'code' => 5]);
// SAN JOSÉ - TIBÁS
District::create(['province_id' => 1, 'canton_id' => 13, 'name' => 'San Juan', 'code' => 1]);
District::create(['province_id' => 1, 'canton_id' => 13, 'name' => 'Cinco Esquinas', 'code' => 2]);
District::create(['province_id' => 1, 'canton_id' => 13, 'name' => 'Anselmo Llorente', 'code' => 3]);
District::create(['province_id' => 1, 'canton_id' => 13, 'name' => 'Leon XIII', 'code' => 4]);
District::create(['province_id' => 1, 'canton_id' => 13, 'name' => 'Colima', 'code' => 5]);
// SAN JOSÉ - MORAVIA
District::create(['province_id' => 1, 'canton_id' => 14, 'name' => 'San Vicente', 'code' => 1]);
District::create(['province_id' => 1, 'canton_id' => 14, 'name' => 'San Jeronimo', 'code' => 2]);
District::create(['province_id' => 1, 'canton_id' => 14, 'name' => 'La Trinidad', 'code' => 3]);
// SAN JOSÉ - MONTES
District::create(['province_id' => 1, 'canton_id' => 15, 'name' => 'San Pedro', 'code' => 1]);
District::create(['province_id' => 1, 'canton_id' => 15, 'name' => 'Sabanilla', 'code' => 2]);
District::create(['province_id' => 1, 'canton_id' => 15, 'name' => 'Mercedes', 'code' => 3]);
District::create(['province_id' => 1, 'canton_id' => 15, 'name' => 'San Rafael', 'code' => 4]);
// SAN JOSÉ - TURRUBARES
District::create(['province_id' => 1, 'canton_id' => 16, 'name' => 'San Pablo', 'code' => 1]);
District::create(['province_id' => 1, 'canton_id' => 16, 'name' => 'San Pedro', 'code' => 2]);
District::create(['province_id' => 1, 'canton_id' => 16, 'name' => 'San Juan De Mata', 'code' => 3]);
District::create(['province_id' => 1, 'canton_id' => 16, 'name' => 'San Luis', 'code' => 4]);
District::create(['province_id' => 1, 'canton_id' => 16, 'name' => 'Carara', 'code' => 5]);
// SAN JOSÉ - DOTA
District::create(['province_id' => 1, 'canton_id' => 17, 'name' => 'Santa María', 'code' => 1]);
District::create(['province_id' => 1, 'canton_id' => 17, 'name' => 'Jardin', 'code' => 2]);
District::create(['province_id' => 1, 'canton_id' => 17, 'name' => 'Copey', 'code' => 3]);
// SAN JOSÉ - CURRIDABAT
District::create(['province_id' => 1, 'canton_id' => 18, 'name' => 'Curridabat', 'code' => 1]);
District::create(['province_id' => 1, 'canton_id' => 18, 'name' => 'Granadilla', 'code' => 2]);
District::create(['province_id' => 1, 'canton_id' => 18, 'name' => 'Sanchez', 'code' => 3]);
District::create(['province_id' => 1, 'canton_id' => 18, 'name' => 'Tirrases', 'code' => 4]);
// SAN JOSÉ - PÉREZ ZELEDÓN
District::create(['province_id' => 1, 'canton_id' => 19, 'name' => 'San Isidro De El General', 'code' => 1]);
District::create(['province_id' => 1, 'canton_id' => 19, 'name' => 'El General', 'code' => 2]);
District::create(['province_id' => 1, 'canton_id' => 19, 'name' => 'Daniel Flores', 'code' => 3]);
District::create(['province_id' => 1, 'canton_id' => 19, 'name' => 'Rivas', 'code' => 4]);
District::create(['province_id' => 1, 'canton_id' => 19, 'name' => 'San Pedro', 'code' => 5]);
District::create(['province_id' => 1, 'canton_id' => 19, 'name' => 'Platanares', 'code' => 6]);
District::create(['province_id' => 1, 'canton_id' => 19, 'name' => 'Pejibaye', 'code' => 7]);
District::create(['province_id' => 1, 'canton_id' => 19, 'name' => 'Cajon', 'code' => 8]);
District::create(['province_id' => 1, 'canton_id' => 19, 'name' => 'Baru', 'code' => 9]);
District::create(['province_id' => 1, 'canton_id' => 19, 'name' => 'Rio Nuevo', 'code' => 10]);
District::create(['province_id' => 1, 'canton_id' => 19, 'name' => 'Páramo', 'code' => 11]);
// SAN JOSÉ - TIBÁS
District::create(['province_id' => 1, 'canton_id' => 20, 'name' => 'San Pablo', 'code' => 1]);
District::create(['province_id' => 1, 'canton_id' => 20, 'name' => 'San Andres', 'code' => 2]);
District::create(['province_id' => 1, 'canton_id' => 20, 'name' => 'Llano Bonito', 'code' => 3]);
District::create(['province_id' => 1, 'canton_id' => 20, 'name' => 'San Isidro', 'code' => 4]);
District::create(['province_id' => 1, 'canton_id' => 20, 'name' => 'Santa Cruz', 'code' => 5]);
District::create(['province_id' => 1, 'canton_id' => 20, 'name' => 'San Antonio', 'code' => 6]);
// ALAJUELA - CENTRAL
District::create(['province_id' => 2, 'canton_id' => 21, 'name' => 'Alajuela', 'code' => 1]);
District::create(['province_id' => 2, 'canton_id' => 21, 'name' => 'San José', 'code' => 2]);
District::create(['province_id' => 2, 'canton_id' => 21, 'name' => 'Carrizal', 'code' => 3]);
District::create(['province_id' => 2, 'canton_id' => 21, 'name' => 'San Antonio', 'code' => 4]);
District::create(['province_id' => 2, 'canton_id' => 21, 'name' => 'Guácima', 'code' => 5]);
District::create(['province_id' => 2, 'canton_id' => 21, 'name' => 'San Isidro', 'code' => 6]);
District::create(['province_id' => 2, 'canton_id' => 21, 'name' => 'Sabanilla', 'code' => 7]);
District::create(['province_id' => 2, 'canton_id' => 21, 'name' => 'San Rafael', 'code' => 8]);
District::create(['province_id' => 2, 'canton_id' => 21, 'name' => 'Rio Segundo', 'code' => 9]);
District::create(['province_id' => 2, 'canton_id' => 21, 'name' => 'Desamparados', 'code' => 10]);
District::create(['province_id' => 2, 'canton_id' => 21, 'name' => 'Turrucares', 'code' => 11]);
District::create(['province_id' => 2, 'canton_id' => 21, 'name' => 'Tambor', 'code' => 12]);
District::create(['province_id' => 2, 'canton_id' => 21, 'name' => 'Garita', 'code' => 13]);
District::create(['province_id' => 2, 'canton_id' => 21, 'name' => 'Sarapiquí', 'code' => 14]);
// ALAJUELA - SAN RAMÓN
District::create(['province_id' => 2, 'canton_id' => 22, 'name' => 'San Ramón', 'code' => 1]);
District::create(['province_id' => 2, 'canton_id' => 22, 'name' => 'Santiago', 'code' => 2]);
District::create(['province_id' => 2, 'canton_id' => 22, 'name' => 'San Juan', 'code' => 3]);
District::create(['province_id' => 2, 'canton_id' => 22, 'name' => 'Piedades Norte', 'code' => 4]);
District::create(['province_id' => 2, 'canton_id' => 22, 'name' => 'Piedades Sur', 'code' => 5]);
District::create(['province_id' => 2, 'canton_id' => 22, 'name' => 'San Rafael', 'code' => 6]);
District::create(['province_id' => 2, 'canton_id' => 22, 'name' => 'San Isidro', 'code' => 7]);
District::create(['province_id' => 2, 'canton_id' => 22, 'name' => 'Angeles', 'code' => 8]);
District::create(['province_id' => 2, 'canton_id' => 22, 'name' => 'Alfaro', 'code' => 9]);
District::create(['province_id' => 2, 'canton_id' => 22, 'name' => 'Volio', 'code' => 10]);
District::create(['province_id' => 2, 'canton_id' => 22, 'name' => 'Concepción', 'code' => 11]);
District::create(['province_id' => 2, 'canton_id' => 22, 'name' => 'Zapotal', 'code' => 12]);
District::create(['province_id' => 2, 'canton_id' => 22, 'name' => 'Peñas Blancas', 'code' => 13]);
District::create(['province_id' => 2, 'canton_id' => 22, 'name' => 'San Lorenzo', 'code' => 14]);
// ALAJUELA - GRECIA
District::create(['province_id' => 2, 'canton_id' => 23, 'name' => 'Grecia', 'code' => 1]);
District::create(['province_id' => 2, 'canton_id' => 23, 'name' => 'San Isidro', 'code' => 2]);
District::create(['province_id' => 2, 'canton_id' => 23, 'name' => 'San José', 'code' => 3]);
District::create(['province_id' => 2, 'canton_id' => 23, 'name' => 'San Roque', 'code' => 4]);
District::create(['province_id' => 2, 'canton_id' => 23, 'name' => 'Tacares', 'code' => 5]);
District::create(['province_id' => 2, 'canton_id' => 23, 'name' => 'Rio Cuarto', 'code' => 6]);
District::create(['province_id' => 2, 'canton_id' => 23, 'name' => 'Puente De Piedra', 'code' => 7]);
District::create(['province_id' => 2, 'canton_id' => 23, 'name' => 'Bolivar', 'code' => 8]);
// ALAJUELA - SAN MATEO
District::create(['province_id' => 2, 'canton_id' => 24, 'name' => 'San Mateo', 'code' => 1]);
District::create(['province_id' => 2, 'canton_id' => 24, 'name' => 'Desmonte', 'code' => 2]);
District::create(['province_id' => 2, 'canton_id' => 24, 'name' => 'Jesús María', 'code' => 3]);
District::create(['province_id' => 2, 'canton_id' => 24, 'name' => 'Labrador', 'code' => 4]);
// ALAJUELA - ATENAS
District::create(['province_id' => 2, 'canton_id' => 25, 'name' => 'Atenas', 'code' => 1]);
District::create(['province_id' => 2, 'canton_id' => 25, 'name' => 'Jesús', 'code' => 2]);
District::create(['province_id' => 2, 'canton_id' => 25, 'name' => 'Mercedes', 'code' => 3]);
District::create(['province_id' => 2, 'canton_id' => 25, 'name' => 'San Isidro', 'code' => 4]);
District::create(['province_id' => 2, 'canton_id' => 25, 'name' => 'Concepción', 'code' => 5]);
District::create(['province_id' => 2, 'canton_id' => 25, 'name' => 'San José', 'code' => 6]);
District::create(['province_id' => 2, 'canton_id' => 25, 'name' => 'Santa Eulalia', 'code' => 7]);
District::create(['province_id' => 2, 'canton_id' => 25, 'name' => 'Escobal', 'code' => 8]);
// ALAJUELA - NARANJO
District::create(['province_id' => 2, 'canton_id' => 26, 'name' => 'Naranjo', 'code' => 1]);
District::create(['province_id' => 2, 'canton_id' => 26, 'name' => 'San Miguel', 'code' => 2]);
District::create(['province_id' => 2, 'canton_id' => 26, 'name' => 'San José', 'code' => 3]);
District::create(['province_id' => 2, 'canton_id' => 26, 'name' => 'Cirrí Sur', 'code' => 4]);
District::create(['province_id' => 2, 'canton_id' => 26, 'name' => 'San Jerónimo', 'code' => 5]);
District::create(['province_id' => 2, 'canton_id' => 26, 'name' => 'San Juan', 'code' => 6]);
District::create(['province_id' => 2, 'canton_id' => 26, 'name' => 'El Rosario', 'code' => 7]);
District::create(['province_id' => 2, 'canton_id' => 26, 'name' => 'Palmitos', 'code' => 8]);
// ALAJUELA - PALMARES
District::create(['province_id' => 2, 'canton_id' => 27, 'name' => 'Palmares', 'code' => 1]);
District::create(['province_id' => 2, 'canton_id' => 27, 'name' => 'Zaragoza', 'code' => 2]);
District::create(['province_id' => 2, 'canton_id' => 27, 'name' => 'Buenos Aires', 'code' => 3]);
District::create(['province_id' => 2, 'canton_id' => 27, 'name' => 'Santiago', 'code' => 4]);
District::create(['province_id' => 2, 'canton_id' => 27, 'name' => 'Candelaria', 'code' => 5]);
District::create(['province_id' => 2, 'canton_id' => 27, 'name' => 'Esquipulas', 'code' => 6]);
District::create(['province_id' => 2, 'canton_id' => 27, 'name' => 'La Granja', 'code' => 7]);
// ALAJUELA - POÁS
District::create(['province_id' => 2, 'canton_id' => 28, 'name' => 'San Pedro', 'code' => 1]);
District::create(['province_id' => 2, 'canton_id' => 28, 'name' => 'San Juan', 'code' => 2]);
District::create(['province_id' => 2, 'canton_id' => 28, 'name' => 'San Rafael', 'code' => 3]);
District::create(['province_id' => 2, 'canton_id' => 28, 'name' => 'Carrillos', 'code' => 4]);
District::create(['province_id' => 2, 'canton_id' => 28, 'name' => 'Sabana Redonda', 'code' => 5]);
// ALAJUELA - OROTINA
District::create(['province_id' => 2, 'canton_id' => 29, 'name' => 'Orotina', 'code' => 1]);
District::create(['province_id' => 2, 'canton_id' => 29, 'name' => 'El Mastate', 'code' => 2]);
District::create(['province_id' => 2, 'canton_id' => 29, 'name' => 'Hacienda Vieja', 'code' => 3]);
District::create(['province_id' => 2, 'canton_id' => 29, 'name' => 'Coyolar', 'code' => 4]);
District::create(['province_id' => 2, 'canton_id' => 29, 'name' => 'La Ceiba', 'code' => 5]);
// ALAJUELA - SAN CARLOS
District::create(['province_id' => 2, 'canton_id' => 30, 'name' => 'Quesada', 'code' => 1]);
District::create(['province_id' => 2, 'canton_id' => 30, 'name' => 'Florencia', 'code' => 2]);
District::create(['province_id' => 2, 'canton_id' => 30, 'name' => 'Buenavista', 'code' => 3]);
District::create(['province_id' => 2, 'canton_id' => 30, 'name' => 'Aguas Zarcas', 'code' => 4]);
District::create(['province_id' => 2, 'canton_id' => 30, 'name' => 'Venecia', 'code' => 5]);
District::create(['province_id' => 2, 'canton_id' => 30, 'name' => 'Pital', 'code' => 6]);
District::create(['province_id' => 2, 'canton_id' => 30, 'name' => 'La Fortuna', 'code' => 7]);
District::create(['province_id' => 2, 'canton_id' => 30, 'name' => 'La Tigra', 'code' => 8]);
District::create(['province_id' => 2, 'canton_id' => 30, 'name' => 'La Palmera', 'code' => 9]);
District::create(['province_id' => 2, 'canton_id' => 30, 'name' => 'Venado', 'code' => 10]);
District::create(['province_id' => 2, 'canton_id' => 30, 'name' => 'Cutris', 'code' => 11]);
District::create(['province_id' => 2, 'canton_id' => 30, 'name' => 'Monterrey', 'code' => 12]);
District::create(['province_id' => 2, 'canton_id' => 30, 'name' => 'Pocosol', 'code' => 13]);
// ALAJUELA - SAN CARLOS
District::create(['province_id' => 2, 'canton_id' => 31, 'name' => 'Zarcero', 'code' => 1]);
District::create(['province_id' => 2, 'canton_id' => 31, 'name' => 'Laguna', 'code' => 2]);
District::create(['province_id' => 2, 'canton_id' => 31, 'name' => 'Tapesco', 'code' => 3]);
District::create(['province_id' => 2, 'canton_id' => 31, 'name' => 'Guadalupe', 'code' => 4]);
District::create(['province_id' => 2, 'canton_id' => 31, 'name' => 'Palmira', 'code' => 5]);
District::create(['province_id' => 2, 'canton_id' => 31, 'name' => 'Zapote', 'code' => 6]);
District::create(['province_id' => 2, 'canton_id' => 31, 'name' => 'Brisas', 'code' => 7]);
// ALAJUELA - SARCHÍ
District::create(['province_id' => 2, 'canton_id' => 32, 'name' => 'Sarchí Norte', 'code' => 1]);
District::create(['province_id' => 2, 'canton_id' => 32, 'name' => 'Sarchí Sur', 'code' => 2]);
District::create(['province_id' => 2, 'canton_id' => 32, 'name' => 'Toro Amarillo', 'code' => 3]);
District::create(['province_id' => 2, 'canton_id' => 32, 'name' => 'San Pedro', 'code' => 4]);
District::create(['province_id' => 2, 'canton_id' => 32, 'name' => 'Rodriguez', 'code' => 5]);
// ALAJUELA - UPALA
District::create(['province_id' => 2, 'canton_id' => 33, 'name' => 'Upala', 'code' => 1]);
District::create(['province_id' => 2, 'canton_id' => 33, 'name' => 'Aguas Claras', 'code' => 2]);
District::create(['province_id' => 2, 'canton_id' => 33, 'name' => 'San José o Pizote', 'code' => 3]);
District::create(['province_id' => 2, 'canton_id' => 33, 'name' => 'Bijagua', 'code' => 4]);
District::create(['province_id' => 2, 'canton_id' => 33, 'name' => 'Delicias', 'code' => 5]);
District::create(['province_id' => 2, 'canton_id' => 33, 'name' => 'Dos Rios', 'code' => 6]);
District::create(['province_id' => 2, 'canton_id' => 33, 'name' => 'Yolillal', 'code' => 7]);
District::create(['province_id' => 2, 'canton_id' => 33, 'name' => 'Canalete', 'code' => 8]);
// ALAJUELA - LOS CHILES
District::create(['province_id' => 2, 'canton_id' => 34, 'name' => 'Los Chiles', 'code' => 1]);
District::create(['province_id' => 2, 'canton_id' => 34, 'name' => 'Caño Negro', 'code' => 2]);
District::create(['province_id' => 2, 'canton_id' => 34, 'name' => 'El Amparo', 'code' => 3]);
District::create(['province_id' => 2, 'canton_id' => 34, 'name' => 'San Jorge', 'code' => 4]);
// ALAJUELA - GUATUSO
District::create(['province_id' => 2, 'canton_id' => 35, 'name' => 'San Rafael', 'code' => 1]);
District::create(['province_id' => 2, 'canton_id' => 35, 'name' => 'Buenavista', 'code' => 2]);
District::create(['province_id' => 2, 'canton_id' => 35, 'name' => 'Cote', 'code' => 3]);
District::create(['province_id' => 2, 'canton_id' => 35, 'name' => 'Katira', 'code' => 4]);
// ALAJUELA - RIO CUARTO
District::create(['province_id' => 2, 'canton_id' => 36, 'name' => 'Río Cuarto', 'code' => 1]);
District::create(['province_id' => 2, 'canton_id' => 36, 'name' => 'Santa Rita', 'code' => 2]);
District::create(['province_id' => 2, 'canton_id' => 36, 'name' => 'Santa Isabel', 'code' => 3]);
// CARTAGO - CENTRAL
District::create(['province_id' => 3, 'canton_id' => 37, 'name' => 'Parte Oriental', 'code' => 1]);
District::create(['province_id' => 3, 'canton_id' => 37, 'name' => 'Parte Occidental', 'code' => 2]);
District::create(['province_id' => 3, 'canton_id' => 37, 'name' => 'Carmen', 'code' => 3]);
District::create(['province_id' => 3, 'canton_id' => 37, 'name' => 'San Nicolás', 'code' => 4]);
District::create(['province_id' => 3, 'canton_id' => 37, 'name' => 'San Francisco', 'code' => 5]);
District::create(['province_id' => 3, 'canton_id' => 37, 'name' => 'Guadalupe', 'code' => 6]);
District::create(['province_id' => 3, 'canton_id' => 37, 'name' => 'Corralillo', 'code' => 7]);
District::create(['province_id' => 3, 'canton_id' => 37, 'name' => 'Tierra Blanca', 'code' => 8]);
District::create(['province_id' => 3, 'canton_id' => 37, 'name' => 'Dulce Nombre', 'code' => 9]);
District::create(['province_id' => 3, 'canton_id' => 37, 'name' => 'Llano Grande', 'code' => 10]);
District::create(['province_id' => 3, 'canton_id' => 37, 'name' => 'Quebradilla', 'code' => 11]);
// CARTAGO - PARAISO
District::create(['province_id' => 3, 'canton_id' => 38, 'name' => 'Paraiso', 'code' => 1]);
District::create(['province_id' => 3, 'canton_id' => 38, 'name' => 'Santiago', 'code' => 2]);
District::create(['province_id' => 3, 'canton_id' => 38, 'name' => 'Orosi', 'code' => 3]);
District::create(['province_id' => 3, 'canton_id' => 38, 'name' => 'Cachí', 'code' => 4]);
District::create(['province_id' => 3, 'canton_id' => 38, 'name' => 'Llanos de Santa Lucía', 'code' => 5]);
// CARTAGO - LA UNIÓN
District::create(['province_id' => 3, 'canton_id' => 39, 'name' => 'Tres Rios', 'code' => 1]);
District::create(['province_id' => 3, 'canton_id' => 39, 'name' => 'San Diego', 'code' => 2]);
District::create(['province_id' => 3, 'canton_id' => 39, 'name' => 'San Juan', 'code' => 3]);
District::create(['province_id' => 3, 'canton_id' => 39, 'name' => 'San Rafael', 'code' => 4]);
District::create(['province_id' => 3, 'canton_id' => 39, 'name' => 'Concepción', 'code' => 5]);
District::create(['province_id' => 3, 'canton_id' => 39, 'name' => 'Dulce Nombre', 'code' => 6]);
District::create(['province_id' => 3, 'canton_id' => 39, 'name' => 'San Ramón', 'code' => 7]);
District::create(['province_id' => 3, 'canton_id' => 39, 'name' => 'Rio Azul', 'code' => 8]);
// CARTAGO - JIMENEZ
District::create(['province_id' => 3, 'canton_id' => 40, 'name' => 'Juan Viñas', 'code' => 1]);
District::create(['province_id' => 3, 'canton_id' => 40, 'name' => 'Tucurrique', 'code' => 2]);
District::create(['province_id' => 3, 'canton_id' => 40, 'name' => 'Pejibaye', 'code' => 3]);
// CARTAGO - TURRIALBA
District::create(['province_id' => 3, 'canton_id' => 41, 'name' => 'Turrialba', 'code' => 1]);
District::create(['province_id' => 3, 'canton_id' => 41, 'name' => 'La Suiza', 'code' => 2]);
District::create(['province_id' => 3, 'canton_id' => 41, 'name' => 'Peralta', 'code' => 3]);
District::create(['province_id' => 3, 'canton_id' => 41, 'name' => 'Santa Cruz', 'code' => 4]);
District::create(['province_id' => 3, 'canton_id' => 41, 'name' => 'Santa Teresita', 'code' => 5]);
District::create(['province_id' => 3, 'canton_id' => 41, 'name' => 'Pavones', 'code' => 6]);
District::create(['province_id' => 3, 'canton_id' => 41, 'name' => 'Tuis', 'code' => 7]);
District::create(['province_id' => 3, 'canton_id' => 41, 'name' => 'Tayutic', 'code' => 8]);
District::create(['province_id' => 3, 'canton_id' => 41, 'name' => 'Santa Rosa', 'code' => 9]);
District::create(['province_id' => 3, 'canton_id' => 41, 'name' => 'Tres Equis', 'code' => 10]);
District::create(['province_id' => 3, 'canton_id' => 41, 'name' => 'La Isabel', 'code' => 11]);
District::create(['province_id' => 3, 'canton_id' => 41, 'name' => 'Chirripó', 'code' => 12]);
// CARTAGO - ALVARADO
District::create(['province_id' => 3, 'canton_id' => 42, 'name' => 'Pacayas', 'code' => 1]);
District::create(['province_id' => 3, 'canton_id' => 42, 'name' => 'Cervantes', 'code' => 2]);
District::create(['province_id' => 3, 'canton_id' => 42, 'name' => 'Capellades', 'code' => 3]);
// CARTAGO - OREAMUNO
District::create(['province_id' => 3, 'canton_id' => 43, 'name' => 'San Rafael', 'code' => 1]);
District::create(['province_id' => 3, 'canton_id' => 43, 'name' => 'Cot', 'code' => 2]);
District::create(['province_id' => 3, 'canton_id' => 43, 'name' => 'Potrero Cerrado', 'code' => 3]);
District::create(['province_id' => 3, 'canton_id' => 43, 'name' => 'Cipreses', 'code' => 4]);
District::create(['province_id' => 3, 'canton_id' => 43, 'name' => 'Santa Rosa', 'code' => 5]);
// CARTAGO - GUARCO
District::create(['province_id' => 3, 'canton_id' => 44, 'name' => 'El Tejar', 'code' => 1]);
District::create(['province_id' => 3, 'canton_id' => 44, 'name' => 'San Isidro', 'code' => 2]);
District::create(['province_id' => 3, 'canton_id' => 44, 'name' => 'Tobosi', 'code' => 3]);
District::create(['province_id' => 3, 'canton_id' => 44, 'name' => 'Patio De Agua', 'code' => 4]);
// HEREDIA - CENTRAL
District::create(['province_id' => 4, 'canton_id' => 45, 'name' => 'Heredia', 'code' => 1]);
District::create(['province_id' => 4, 'canton_id' => 45, 'name' => 'Mercedes', 'code' => 2]);
District::create(['province_id' => 4, 'canton_id' => 45, 'name' => 'San Francisco', 'code' => 3]);
District::create(['province_id' => 4, 'canton_id' => 45, 'name' => 'Ulloa', 'code' => 4]);
District::create(['province_id' => 4, 'canton_id' => 45, 'name' => 'Varablanca', 'code' => 5]);
// HEREDIA - BARVA
District::create(['province_id' => 4, 'canton_id' => 46, 'name' => 'Barva', 'code' => 1]);
District::create(['province_id' => 4, 'canton_id' => 46, 'name' => 'San Pedro', 'code' => 2]);
District::create(['province_id' => 4, 'canton_id' => 46, 'name' => 'San Pablo', 'code' => 3]);
District::create(['province_id' => 4, 'canton_id' => 46, 'name' => 'San Roque', 'code' => 4]);
District::create(['province_id' => 4, 'canton_id' => 46, 'name' => 'Santa Lucía', 'code' => 5]);
District::create(['province_id' => 4, 'canton_id' => 46, 'name' => 'San José de la Montaña', 'code' => 6]);
// HEREDIA - SANTO DOMINGO
District::create(['province_id' => 4, 'canton_id' => 47, 'name' => 'Santo Domingo', 'code' => 1]);
District::create(['province_id' => 4, 'canton_id' => 47, 'name' => 'San Vicente', 'code' => 2]);
District::create(['province_id' => 4, 'canton_id' => 47, 'name' => 'San Miguel', 'code' => 3]);
District::create(['province_id' => 4, 'canton_id' => 47, 'name' => 'Paracito', 'code' => 4]);
District::create(['province_id' => 4, 'canton_id' => 47, 'name' => 'Santo Tomás', 'code' => 5]);
District::create(['province_id' => 4, 'canton_id' => 47, 'name' => 'Santa Rosa', 'code' => 6]);
District::create(['province_id' => 4, 'canton_id' => 47, 'name' => 'Tures', 'code' => 7]);
District::create(['province_id' => 4, 'canton_id' => 47, 'name' => 'Para', 'code' => 8]);
// HEREDIA - SANTA BÁRBARA
District::create(['province_id' => 4, 'canton_id' => 48, 'name' => 'Santa Bárbara', 'code' => 1]);
District::create(['province_id' => 4, 'canton_id' => 48, 'name' => 'San Pedro', 'code' => 2]);
District::create(['province_id' => 4, 'canton_id' => 48, 'name' => 'San Juan', 'code' => 3]);
District::create(['province_id' => 4, 'canton_id' => 48, 'name' => 'Jesús', 'code' => 4]);
District::create(['province_id' => 4, 'canton_id' => 48, 'name' => 'Santo Domingo', 'code' => 5]);
District::create(['province_id' => 4, 'canton_id' => 48, 'name' => 'Puraba', 'code' => 6]);
// HEREDIA - SAN RAFAEL
District::create(['province_id' => 4, 'canton_id' => 49, 'name' => 'San Rafael', 'code' => 1]);
District::create(['province_id' => 4, 'canton_id' => 49, 'name' => 'San Josecito', 'code' => 2]);
District::create(['province_id' => 4, 'canton_id' => 49, 'name' => 'Santiago', 'code' => 3]);
District::create(['province_id' => 4, 'canton_id' => 49, 'name' => 'Los Ángeles', 'code' => 4]);
District::create(['province_id' => 4, 'canton_id' => 49, 'name' => 'Concepción', 'code' => 5]);
// HEREDIA - SAN ISIDRO
District::create(['province_id' => 4, 'canton_id' => 50, 'name' => 'San Isidro', 'code' => 1]);
District::create(['province_id' => 4, 'canton_id' => 50, 'name' => 'San José', 'code' => 2]);
District::create(['province_id' => 4, 'canton_id' => 50, 'name' => 'Concepción', 'code' => 3]);
District::create(['province_id' => 4, 'canton_id' => 50, 'name' => 'San Francisco', 'code' => 4]);
// HEREDIA - BELÉN
District::create(['province_id' => 4, 'canton_id' => 51, 'name' => 'San Antonio', 'code' => 1]);
District::create(['province_id' => 4, 'canton_id' => 51, 'name' => 'La Ribera', 'code' => 2]);
District::create(['province_id' => 4, 'canton_id' => 51, 'name' => 'La Asuncion', 'code' => 3]);
// HEREDIA - FLORES
District::create(['province_id' => 4, 'canton_id' => 52, 'name' => 'San Joaquín', 'code' => 1]);
District::create(['province_id' => 4, 'canton_id' => 52, 'name' => 'Barrantes', 'code' => 2]);
District::create(['province_id' => 4, 'canton_id' => 52, 'name' => 'Llorente', 'code' => 3]);
// HEREDIA - SAN PABLO
District::create(['province_id' => 4, 'canton_id' => 53, 'name' => 'San Pablo', 'code' => 1]);
District::create(['province_id' => 4, 'canton_id' => 53, 'name' => 'Rincón De Sabanilla', 'code' => 2]);
// HEREDIA - SARAPIQUÍ
District::create(['province_id' => 4, 'canton_id' => 54, 'name' => 'Puerto Viejo', 'code' => 1]);
District::create(['province_id' => 4, 'canton_id' => 54, 'name' => 'La Virgen', 'code' => 2]);
District::create(['province_id' => 4, 'canton_id' => 54, 'name' => 'Las Horquetas', 'code' => 3]);
District::create(['province_id' => 4, 'canton_id' => 54, 'name' => 'Llanuras Del Gaspar', 'code' => 4]);
District::create(['province_id' => 4, 'canton_id' => 54, 'name' => 'Cureña', 'code' => 5]);
// GUANACASTE - LIBERIA
District::create(['province_id' => 5, 'canton_id' => 55, 'name' => 'Liberia', 'code' => 1]);
District::create(['province_id' => 5, 'canton_id' => 55, 'name' => 'Cañas Dulces', 'code' => 2]);
District::create(['province_id' => 5, 'canton_id' => 55, 'name' => 'Mayorga', 'code' => 3]);
District::create(['province_id' => 5, 'canton_id' => 55, 'name' => 'Nacascolo', 'code' => 4]);
District::create(['province_id' => 5, 'canton_id' => 55, 'name' => 'Curubande', 'code' => 5]);
// GUANACASTE - NICOYA
District::create(['province_id' => 5, 'canton_id' => 56, 'name' => 'Nicoya', 'code' => 1]);
District::create(['province_id' => 5, 'canton_id' => 56, 'name' => 'Mansión', 'code' => 2]);
District::create(['province_id' => 5, 'canton_id' => 56, 'name' => 'San Antonio', 'code' => 3]);
District::create(['province_id' => 5, 'canton_id' => 56, 'name' => 'Quebrada Honda', 'code' => 4]);
District::create(['province_id' => 5, 'canton_id' => 56, 'name' => 'Sámara', 'code' => 5]);
District::create(['province_id' => 5, 'canton_id' => 56, 'name' => 'Nosara', 'code' => 6]);
District::create(['province_id' => 5, 'canton_id' => 56, 'name' => 'Belén De Nosarita', 'code' => 7]);
// GUANACASTE - SANTA CRUZ
District::create(['province_id' => 5, 'canton_id' => 57, 'name' => 'Santa Cruz', 'code' => 1]);
District::create(['province_id' => 5, 'canton_id' => 57, 'name' => 'Bolson', 'code' => 2]);
District::create(['province_id' => 5, 'canton_id' => 57, 'name' => 'Veintisiete de Abril', 'code' => 3]);
District::create(['province_id' => 5, 'canton_id' => 57, 'name' => 'Tempate', 'code' => 4]);
District::create(['province_id' => 5, 'canton_id' => 57, 'name' => 'Cartagena', 'code' => 5]);
District::create(['province_id' => 5, 'canton_id' => 57, 'name' => 'Cuajiniquil', 'code' => 6]);
District::create(['province_id' => 5, 'canton_id' => 57, 'name' => 'Diria', 'code' => 7]);
District::create(['province_id' => 5, 'canton_id' => 57, 'name' => 'Cabo Velas', 'code' => 8]);
District::create(['province_id' => 5, 'canton_id' => 57, 'name' => 'Tamarindo', 'code' => 9]);
// GUANACASTE - BAGACES
District::create(['province_id' => 5, 'canton_id' => 58, 'name' => 'Bagaces', 'code' => 1]);
District::create(['province_id' => 5, 'canton_id' => 58, 'name' => 'La Fortuna', 'code' => 2]);
District::create(['province_id' => 5, 'canton_id' => 58, 'name' => 'Mogote', 'code' => 3]);
District::create(['province_id' => 5, 'canton_id' => 58, 'name' => 'Río Naranjo', 'code' => 4]);
// GUANACASTE - CARRILLO
District::create(['province_id' => 5, 'canton_id' => 59, 'name' => 'Filadelfia', 'code' => 1]);
District::create(['province_id' => 5, 'canton_id' => 59, 'name' => 'Palmira', 'code' => 2]);
District::create(['province_id' => 5, 'canton_id' => 59, 'name' => 'Sardinal', 'code' => 3]);
District::create(['province_id' => 5, 'canton_id' => 59, 'name' => 'Belen', 'code' => 4]);
// GUANACASTE - CAÑAS
District::create(['province_id' => 5, 'canton_id' => 60, 'name' => 'Cañas', 'code' => 1]);
District::create(['province_id' => 5, 'canton_id' => 60, 'name' => 'Palmira', 'code' => 2]);
District::create(['province_id' => 5, 'canton_id' => 60, 'name' => 'San Miguel', 'code' => 3]);
District::create(['province_id' => 5, 'canton_id' => 60, 'name' => 'Bebedero', 'code' => 4]);
District::create(['province_id' => 5, 'canton_id' => 60, 'name' => 'Porozal', 'code' => 5]);
// GUANACASTE - ABANGARES
District::create(['province_id' => 5, 'canton_id' => 61, 'name' => 'Las Juntas', 'code' => 1]);
District::create(['province_id' => 5, 'canton_id' => 61, 'name' => 'Sierra', 'code' => 2]);
District::create(['province_id' => 5, 'canton_id' => 61, 'name' => 'San Juan', 'code' => 3]);
District::create(['province_id' => 5, 'canton_id' => 61, 'name' => 'Colorado', 'code' => 4]);
// GUANACASTE - TILARÁN
District::create(['province_id' => 5, 'canton_id' => 62, 'name' => 'Tilarán', 'code' => 1]);
District::create(['province_id' => 5, 'canton_id' => 62, 'name' => 'Quebrada Grande', 'code' => 2]);
District::create(['province_id' => 5, 'canton_id' => 62, 'name' => 'Tronadora', 'code' => 3]);
District::create(['province_id' => 5, 'canton_id' => 62, 'name' => 'Santa Rosa', 'code' => 4]);
District::create(['province_id' => 5, 'canton_id' => 62, 'name' => 'Líbano', 'code' => 5]);
District::create(['province_id' => 5, 'canton_id' => 62, 'name' => 'Tierras Morenas', 'code' => 6]);
District::create(['province_id' => 5, 'canton_id' => 62, 'name' => 'Arenal', 'code' => 7]);
District::create(['province_id' => 5, 'canton_id' => 62, 'name' => 'Cabeceras', 'code' => 8]);
// GUANACASTE - NANDAYURE
District::create(['province_id' => 5, 'canton_id' => 63, 'name' => 'Carmona', 'code' => 1]);
District::create(['province_id' => 5, 'canton_id' => 63, 'name' => 'Santa Rita', 'code' => 2]);
District::create(['province_id' => 5, 'canton_id' => 63, 'name' => 'Zapotal', 'code' => 3]);
District::create(['province_id' => 5, 'canton_id' => 63, 'name' => 'San Pablo', 'code' => 4]);
District::create(['province_id' => 5, 'canton_id' => 63, 'name' => 'Porvenir', 'code' => 5]);
District::create(['province_id' => 5, 'canton_id' => 63, 'name' => 'Bejuco', 'code' => 6]);
// GUANACASTE - LA CRUZ
District::create(['province_id' => 5, 'canton_id' => 64, 'name' => 'La Cruz', 'code' => 1]);
District::create(['province_id' => 5, 'canton_id' => 64, 'name' => 'Santa Cecilia', 'code' => 2]);
District::create(['province_id' => 5, 'canton_id' => 64, 'name' => 'La Garita', 'code' => 3]);
District::create(['province_id' => 5, 'canton_id' => 64, 'name' => 'Santa Elena', 'code' => 4]);
// GUANACASTE - HOJANCHA
District::create(['province_id' => 5, 'canton_id' => 65, 'name' => 'Hojancha', 'code' => 1]);
District::create(['province_id' => 5, 'canton_id' => 65, 'name' => 'Monte Romo', 'code' => 2]);
District::create(['province_id' => 5, 'canton_id' => 65, 'name' => 'Puerto Carrillo', 'code' => 3]);
District::create(['province_id' => 5, 'canton_id' => 65, 'name' => 'Huacas', 'code' => 4]);
// PUNTARENAS - CENTRAL
District::create(['province_id' => 6, 'canton_id' => 66, 'name' => 'Puntarenas', 'code' => 1]);
District::create(['province_id' => 6, 'canton_id' => 66, 'name' => 'Pitahaya', 'code' => 2]);
District::create(['province_id' => 6, 'canton_id' => 66, 'name' => 'Chomes', 'code' => 3]);
District::create(['province_id' => 6, 'canton_id' => 66, 'name' => 'Lepanto', 'code' => 4]);
District::create(['province_id' => 6, 'canton_id' => 66, 'name' => 'Paquera', 'code' => 5]);
District::create(['province_id' => 6, 'canton_id' => 66, 'name' => 'Manzanillo', 'code' => 6]);
District::create(['province_id' => 6, 'canton_id' => 66, 'name' => 'Guacimal', 'code' => 7]);
District::create(['province_id' => 6, 'canton_id' => 66, 'name' => 'Barranca', 'code' => 8]);
District::create(['province_id' => 6, 'canton_id' => 66, 'name' => 'Monte Verde', 'code' => 9]);
District::create(['province_id' => 6, 'canton_id' => 66, 'name' => 'Isla Del Coco', 'code' => 10]);
District::create(['province_id' => 6, 'canton_id' => 66, 'name' => 'Cóbano', 'code' => 11]);
District::create(['province_id' => 6, 'canton_id' => 66, 'name' => 'Chacarita', 'code' => 12]);
District::create(['province_id' => 6, 'canton_id' => 66, 'name' => 'Chira', 'code' => 13]);
District::create(['province_id' => 6, 'canton_id' => 66, 'name' => 'Acapulco', 'code' => 14]);
District::create(['province_id' => 6, 'canton_id' => 66, 'name' => 'El Roble', 'code' => 15]);
District::create(['province_id' => 6, 'canton_id' => 66, 'name' => 'Arancibia', 'code' => 16]);
// PUNTARENAS - ESPARZA
District::create(['province_id' => 6, 'canton_id' => 67, 'name' => 'Espíritu Santo', 'code' => 1]);
District::create(['province_id' => 6, 'canton_id' => 67, 'name' => 'San Juan Grande', 'code' => 2]);
District::create(['province_id' => 6, 'canton_id' => 67, 'name' => 'Macacona', 'code' => 3]);
District::create(['province_id' => 6, 'canton_id' => 67, 'name' => 'San Rafael', 'code' => 4]);
District::create(['province_id' => 6, 'canton_id' => 67, 'name' => 'San Jerónimo', 'code' => 5]);
District::create(['province_id' => 6, 'canton_id' => 67, 'name' => 'Caldera', 'code' => 6]);
// PUNTARENAS - BUENOS AIRES
District::create(['province_id' => 6, 'canton_id' => 68, 'name' => 'Buenos Aires', 'code' => 1]);
District::create(['province_id' => 6, 'canton_id' => 68, 'name' => 'Volcán', 'code' => 2]);
District::create(['province_id' => 6, 'canton_id' => 68, 'name' => 'Potrero Grande', 'code' => 3]);
District::create(['province_id' => 6, 'canton_id' => 68, 'name' => 'Boruca', 'code' => 4]);
District::create(['province_id' => 6, 'canton_id' => 68, 'name' => 'Pilas', 'code' => 5]);
District::create(['province_id' => 6, 'canton_id' => 68, 'name' => 'Colinas', 'code' => 6]);
District::create(['province_id' => 6, 'canton_id' => 68, 'name' => 'Changuena', 'code' => 7]);
District::create(['province_id' => 6, 'canton_id' => 68, 'name' => 'Biolley', 'code' => 8]);
District::create(['province_id' => 6, 'canton_id' => 68, 'name' => 'Brunka', 'code' => 9]);
// PUNTARENAS - MONTES DE ORO
District::create(['province_id' => 6, 'canton_id' => 69, 'name' => 'Miramar', 'code' => 1]);
District::create(['province_id' => 6, 'canton_id' => 69, 'name' => 'La Unión', 'code' => 2]);
District::create(['province_id' => 6, 'canton_id' => 69, 'name' => 'San Isidro', 'code' => 3]);
// PUNTARENAS - OSA
District::create(['province_id' => 6, 'canton_id' => 70, 'name' => 'Puerto Cortés', 'code' => 1]);
District::create(['province_id' => 6, 'canton_id' => 70, 'name' => 'Palmar', 'code' => 2]);
District::create(['province_id' => 6, 'canton_id' => 70, 'name' => 'Sierpe', 'code' => 3]);
District::create(['province_id' => 6, 'canton_id' => 70, 'name' => 'Bahía Ballena', 'code' => 4]);
District::create(['province_id' => 6, 'canton_id' => 70, 'name' => 'Piedras Blancas', 'code' => 5]);
District::create(['province_id' => 6, 'canton_id' => 70, 'name' => 'Bahía Drake', 'code' => 6]);
// PUNTARENAS - QUEPOS
District::create(['province_id' => 6, 'canton_id' => 71, 'name' => 'Quepos', 'code' => 1]);
District::create(['province_id' => 6, 'canton_id' => 71, 'name' => 'Savegre', 'code' => 2]);
District::create(['province_id' => 6, 'canton_id' => 71, 'name' => 'Naranjito', 'code' => 3]);
// PUNTARENAS - GOLFITO
District::create(['province_id' => 6, 'canton_id' => 72, 'name' => 'Golfito', 'code' => 1]);
District::create(['province_id' => 6, 'canton_id' => 72, 'name' => 'Puerto Jiménez', 'code' => 2]);
District::create(['province_id' => 6, 'canton_id' => 72, 'name' => 'Guaycara', 'code' => 3]);
District::create(['province_id' => 6, 'canton_id' => 72, 'name' => 'Pavón', 'code' => 4]);
// PUNTARENAS - COTO
District::create(['province_id' => 6, 'canton_id' => 73, 'name' => 'San Vito', 'code' => 1]);
District::create(['province_id' => 6, 'canton_id' => 73, 'name' => 'Sabalito', 'code' => 2]);
District::create(['province_id' => 6, 'canton_id' => 73, 'name' => 'Aguabuena', 'code' => 3]);
District::create(['province_id' => 6, 'canton_id' => 73, 'name' => 'Limoncito', 'code' => 4]);
District::create(['province_id' => 6, 'canton_id' => 73, 'name' => 'Pittier', 'code' => 5]);
// PUNTARENAS - PARRITA
District::create(['province_id' => 6, 'canton_id' => 74, 'name' => 'Parrita', 'code' => 1]);
// PUNTARENAS - CORREDORES
District::create(['province_id' => 6, 'canton_id' => 75, 'name' => 'Corredor', 'code' => 1]);
District::create(['province_id' => 6, 'canton_id' => 75, 'name' => 'La Cuesta', 'code' => 2]);
District::create(['province_id' => 6, 'canton_id' => 75, 'name' => 'Canoas', 'code' => 3]);
District::create(['province_id' => 6, 'canton_id' => 75, 'name' => 'Laurel', 'code' => 4]);
// PUNTARENAS - GARABITO
District::create(['province_id' => 6, 'canton_id' => 76, 'name' => 'Jacó', 'code' => 1]);
District::create(['province_id' => 6, 'canton_id' => 76, 'name' => 'Tárcoles', 'code' => 2]);
// LIMÓN - CENTRAL
District::create(['province_id' => 7, 'canton_id' => 77, 'name' => 'Limón', 'code' => 1]);
District::create(['province_id' => 7, 'canton_id' => 77, 'name' => 'Valle La Estrella', 'code' => 2]);
District::create(['province_id' => 7, 'canton_id' => 77, 'name' => 'Rio Blanco', 'code' => 3]);
District::create(['province_id' => 7, 'canton_id' => 77, 'name' => 'Matama', 'code' => 4]);
// LIMÓN - POCOCÍ
District::create(['province_id' => 7, 'canton_id' => 78, 'name' => 'Guapiles', 'code' => 1]);
District::create(['province_id' => 7, 'canton_id' => 78, 'name' => 'Jiménez', 'code' => 2]);
District::create(['province_id' => 7, 'canton_id' => 78, 'name' => 'Rita', 'code' => 3]);
District::create(['province_id' => 7, 'canton_id' => 78, 'name' => 'Roxana', 'code' => 4]);
District::create(['province_id' => 7, 'canton_id' => 78, 'name' => 'Cariari', 'code' => 5]);
District::create(['province_id' => 7, 'canton_id' => 78, 'name' => 'Colorado', 'code' => 6]);
District::create(['province_id' => 7, 'canton_id' => 78, 'name' => 'La Colonia', 'code' => 7]);
// LIMÓN - SIQUIRRES
District::create(['province_id' => 7, 'canton_id' => 79, 'name' => 'Siquirres', 'code' => 1]);
District::create(['province_id' => 7, 'canton_id' => 79, 'name' => 'Pacuarito', 'code' => 2]);
District::create(['province_id' => 7, 'canton_id' => 79, 'name' => 'Florida', 'code' => 3]);
District::create(['province_id' => 7, 'canton_id' => 79, 'name' => 'Germania', 'code' => 4]);
District::create(['province_id' => 7, 'canton_id' => 79, 'name' => 'El Cairo', 'code' => 5]);
District::create(['province_id' => 7, 'canton_id' => 79, 'name' => 'Alegría', 'code' => 6]);
// LIMÓN - TALAMANCA
District::create(['province_id' => 7, 'canton_id' => 80, 'name' => 'Bratsi', 'code' => 1]);
District::create(['province_id' => 7, 'canton_id' => 80, 'name' => 'Sixaola', 'code' => 2]);
District::create(['province_id' => 7, 'canton_id' => 80, 'name' => 'Cahuita', 'code' => 3]);
District::create(['province_id' => 7, 'canton_id' => 80, 'name' => 'Telire', 'code' => 4]);
// LIMÓN - MATINA
District::create(['province_id' => 7, 'canton_id' => 81, 'name' => 'Matina', 'code' => 1]);
District::create(['province_id' => 7, 'canton_id' => 81, 'name' => 'Batán', 'code' => 2]);
District::create(['province_id' => 7, 'canton_id' => 81, 'name' => 'Carrandi', 'code' => 3]);
// LIMÓN - SIQUIRRES
District::create(['province_id' => 7, 'canton_id' => 82, 'name' => 'Guácimo', 'code' => 1]);
District::create(['province_id' => 7, 'canton_id' => 82, 'name' => 'Mercedes', 'code' => 2]);
District::create(['province_id' => 7, 'canton_id' => 82, 'name' => 'Pocora', 'code' => 3]);
District::create(['province_id' => 7, 'canton_id' => 82, 'name' => 'Rio Jiménez', 'code' => 4]);
District::create(['province_id' => 7, 'canton_id' => 82, 'name' => 'Duacari', 'code' => 5]);
