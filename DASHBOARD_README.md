# Dashboard Faskes (Fasilitas Kesehatan)

Dashboard web untuk mengelola data fasilitas kesehatan di Indonesia dengan sistem role-based access (Admin dan User).

## 🚀 Fitur Utama

### 👨‍💼 Admin Features
- ✅ Dashboard dengan statistik lengkap
- ✅ CRUD (Create, Read, Update, Delete) data faskes
- ✅ Manajemen lokasi (Provinsi, Kabupaten/Kota)
- ✅ Kategorisasi dan jenis faskes
- ✅ Rating dan koordinat GPS
- ✅ Import/Export data (Coming Soon)

### 👤 User Features
- ✅ Dashboard view-only
- ✅ Lihat data faskes
- ✅ Detail informasi faskes
- ✅ Pencarian dan filter

## 🎨 Tech Stack
- **Backend**: Laravel 12
- **Frontend**: Tailwind CSS + Alpine.js
- **Database**: MySQL/SQLite
- **Authentication**: Laravel built-in Auth

## 📱 Design Features
- ✅ Responsive design (Mobile-first)
- ✅ Dark mode support
- ✅ Modern UI dengan animasi smooth
- ✅ Interactive components dengan Alpine.js
- ✅ Toast notifications
- ✅ Loading states

## 🔧 Installation

1. Clone repository dan install dependencies:
```bash
composer install
npm install
```

2. Setup environment:
```bash
cp .env.example .env
php artisan key:generate
```

3. Configure database di `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_faskes
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

4. Run migrations dan seeder:
```bash
php artisan migrate --seed
```

5. Start development server:
```bash
php artisan serve
```

## 👥 Demo Accounts

### Admin Account
- **Email**: admin@test.com
- **Password**: password
- **Akses**: Full CRUD operations

### User Account
- **Email**: user@test.com
- **Password**: password
- **Akses**: Read-only access

## 📊 Database Schema

### Core Tables
- `users` - User authentication dengan role
- `faskes` - Data fasilitas kesehatan utama
- `provinsi` - Data provinsi Indonesia
- `kabkota` - Data kabupaten/kota
- `jenis_faskes` - Jenis faskes (RS, Puskesmas, dll)
- `kategori` - Kategori faskes (Negeri/Swasta)

### Sample Data
Seeder sudah menyediakan data contoh:
- 2 users (admin & user)
- 2 provinsi (Jawa Timur & Jawa Tengah)
- 3 kabupaten/kota
- 4 jenis faskes
- 2 kategori
- 5 sample faskes

## 🎯 Key Features Detail

### Dashboard
- Real-time statistics cards
- Recent faskes table
- Quick actions untuk admin
- Welcome message dengan role info

### Data Management
- Advanced filtering dan search
- Pagination dengan Tailwind styling
- Form validation comprehensive
- Error handling yang user-friendly

### Security
- Role-based access control
- CSRF protection
- Input sanitization
- Authentication middleware

### UI/UX
- Sidebar navigation dengan active states
- Dark/light mode toggle
- Mobile responsive sidebar
- Toast notifications untuk feedback
- Loading states untuk better UX

## 🔜 Roadmap

- [ ] Advanced search dengan multiple filters
- [ ] Export data ke Excel/PDF
- [ ] Import data dari CSV
- [ ] Integration dengan Google Maps
- [ ] API endpoints
- [ ] Multi-language support
- [ ] Email notifications
- [ ] Advanced user management

## 📝 Notes

- Aplikasi ini dibuat dengan fokus pada clean code dan maintainability
- UI menggunakan component-based approach
- Database design mengikuti normalization best practices
- Security implementation mengikuti Laravel best practices

## 🤝 Contributing

Feel free to contribute dengan:
1. Fork repository
2. Create feature branch
3. Commit changes
4. Push to branch
5. Create Pull Request

---

**Dibuat dengan ❤️ menggunakan Laravel & Tailwind CSS**
