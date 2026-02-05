<?php
// Migration file: 20260205063557_create_enquiries_table.php
return new class {
    public function up($db)
    {
        $db->exec("CREATE TABLE IF NOT EXISTS enquiries (
            id INT AUTO_INCREMENT PRIMARY KEY,
            type VARCHAR(50) DEFAULT 'contact',
            name VARCHAR(255),
            email VARCHAR(255),
            phone VARCHAR(50),
            company VARCHAR(255),
            designation VARCHAR(255),
            services TEXT,
            budget VARCHAR(100),
            message TEXT,
            calculator_data TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )");
    }

    public function down($db)
    {
        $db->exec("DROP TABLE IF EXISTS enquiries");
    }
};
